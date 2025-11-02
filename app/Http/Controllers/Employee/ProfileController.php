<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;

class ProfileController extends RoleController
{
    protected string $mustRole = 'employee';

    public function index()
    {
        $user = Auth::user();
        return view('employee.profile', compact('user'));
    }
}
