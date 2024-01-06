<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Display all users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function showTasks($id)
    {
        // Display tasks for a specific user
        $user = User::findOrFail($id);
        $tasks = $user->tasks;
        return view('users.show-tasks', compact('user', 'tasks'));
    }

    public function destroy($id)
    {
        // Delete a user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}