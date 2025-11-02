<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RoleController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends RoleController
{
    protected string $mustRole = 'admin';

    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'role'  => 'required|in:admin,hr,manager,employee',
            'password' => 'required|min:6'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User dibuat');
    }
}
