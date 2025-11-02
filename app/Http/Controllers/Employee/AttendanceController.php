<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\RoleController;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends RoleController
{
    protected string $mustRole = 'employee';

    public function index()
    {
        $attendances = Attendance::where('user_id', Auth::id())
            ->orderByDesc('attend_date')
            ->get();

        return view('employee.attendance', compact('attendances'));
    }

    public function store()
    {
        $today = now()->toDateString();

        $attendance = Attendance::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'attend_date' => $today,
            ],
            [
                'check_in' => now()->toTimeString(),
            ]
        );

        // kalau sudah ada check_in tapi belum check_out, berarti ini absen pulang
        if ($attendance->check_in && ! $attendance->check_out) {
            $attendance->update([
                'check_out' => now()->toTimeString(),
            ]);
        }

        return back()->with('success', 'Absensi tercatat.');
    }
}
