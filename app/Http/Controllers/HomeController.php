<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index()
        {
            return view('admin.dashboard');
        }


    public function showAllUsers(): View
    {
        $users = User::all();

        return view('admin.all_users', compact('users'));
    }

public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
