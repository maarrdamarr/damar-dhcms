<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\RoleController;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;

class PayrollController extends RoleController
{
    protected string $mustRole = 'hr';

    public function index()
    {
        $payrolls = Payroll::with('employee')->latest()->get();
        $employees = User::where('role', 'employee')->orderBy('name')->get();

        return view('hr.payrolls.index', compact('payrolls', 'employees'));
    }

    public function generate(Request $request)
    {
        $data = $request->validate([
            'employee_id'  => 'required|integer',
            'period_month' => 'required',
            'basic_salary' => 'required|numeric',
            'allowance'    => 'nullable|numeric',
            'deduction'    => 'nullable|numeric',
        ]);

        $allow = $data['allowance'] ?? 0;
        $ded   = $data['deduction'] ?? 0;

        $data['net_salary'] = ($data['basic_salary'] + $allow) - $ded;

        Payroll::create($data);

        return back()->with('success', 'Payroll dibuat.');
    }
}
