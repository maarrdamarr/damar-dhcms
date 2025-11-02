<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\RoleController;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends RoleController
{
    protected string $mustRole = 'manager';

    public function index()
    {
        $leaves = Leave::where('status', 'pending')->latest()->get();

        return view('manager.approvals.index', compact('leaves'));
    }

    public function approve(Leave $leave)
    {
        $leave->update([
            'status'      => 'approved',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Cuti disetujui.');
    }

    public function reject(Leave $leave)
    {
        $leave->update([
            'status'      => 'rejected',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Cuti ditolak.');
    }
}
