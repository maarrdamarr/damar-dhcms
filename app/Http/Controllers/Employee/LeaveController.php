<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\RoleController;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends RoleController
{
    protected string $mustRole = 'employee';

    public function index()
    {
        $leaves = Leave::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('employee.leaves', compact('leaves'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'reason'     => 'required|string',
        ]);

        $data['user_id'] = Auth::id();
        $data['status']  = 'pending';

        Leave::create($data);

        return back()->with('success', 'Pengajuan cuti terkirim.');
    }
}
