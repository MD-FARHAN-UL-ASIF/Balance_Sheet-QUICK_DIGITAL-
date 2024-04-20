<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BalanceSheetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'index']);
Route::get('balancesheets/edit/{id}', [BalanceSheetController::class, 'edit'])->name('admin.balanceSheet.edit');
Route::get('balancesheets/delete/{id}', [BalanceSheetController::class, 'delete'])->name('admin.balanceSheet.delete');

Route::put('balancesheets/update/{id}', [BalanceSheetController::class, 'update'])->name('admin.balanceSheet.update');

   // Route::get('/admin/balancesheets', [BalanceSheetController::class, 'index'])->name('admin.balanceSheet');
});

Route::get('balancesheets/create', [BalanceSheetController::class, 'create'])->middleware(['auth'])->name('admin.balanceSheet.create');
    Route::get('balancesheets', [BalanceSheetController::class, 'index'])->middleware(['auth'])->name('admin.balanceSheet');
Route::post('balancesheets/save', [BalanceSheetController::class, 'save'])->middleware(['auth'])->name('admin.balanceSheet.save');

require __DIR__.'/auth.php';

//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['Auth', 'admin']);
