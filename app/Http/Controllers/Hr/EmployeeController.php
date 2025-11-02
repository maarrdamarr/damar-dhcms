<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\RoleController;
use App\Models\Employee;
use App\Models\User;

class EmployeeController extends RoleController
{
    protected string $mustRole = 'hr';

    public function index()
    {
        $employees = Employee::with('user')->latest()->get();
        $users = User::orderBy('name')->get(); // untuk assign ke employee

        return view('hr.employees.index', compact('employees', 'users'));
    }
}
