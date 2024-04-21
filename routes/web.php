<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('balancesheets/edit/{id}', [BalanceSheetController::class, 'edit'])->name('admin.balanceSheet.edit');
    Route::get('balancesheets/delete/{id}', [BalanceSheetController::class, 'delete'])->name('admin.balanceSheet.delete');
    Route::put('balancesheets/update/{id}', [BalanceSheetController::class, 'update'])->name('admin.balanceSheet.update');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('admin.register.store');
    Route::get('/admin/all-users', [HomeController::class, 'showAllUsers'])->name('admin.all_users');
    Route::delete('/admin/users/{id}', [HomeController::class, 'deleteUser'])->name('admin.users.delete');

   // Route::get('/admin/balancesheets', [BalanceSheetController::class, 'index'])->name('admin.balanceSheet');
});

Route::get('balancesheets/create', [BalanceSheetController::class, 'create'])->middleware(['auth'])->name('admin.balanceSheet.create');
    Route::get('balancesheets', [BalanceSheetController::class, 'index'])->middleware(['auth'])->name('admin.balanceSheet');
Route::post('balancesheets/save', [BalanceSheetController::class, 'save'])->middleware(['auth'])->name('admin.balanceSheet.save');

require __DIR__.'/auth.php';

//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['Auth', 'admin']);
