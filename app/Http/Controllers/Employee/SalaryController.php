<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\RoleController;
use App\Models\Payroll;
use Illuminate\Support\Facades\Auth;

class SalaryController extends RoleController
{
    protected string $mustRole = 'employee';

    public function index()
    {
        $slips = Payroll::where('employee_id', Auth::id())
            ->orderByDesc('period_month')
            ->get();

        return view('employee.salary-slips', compact('slips'));
    }
}
