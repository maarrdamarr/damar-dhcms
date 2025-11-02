<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\RoleController;
use App\Models\Leave;
use App\Models\Attendance;

class ReportController extends RoleController
{
    protected string $mustRole = 'manager';

    public function index()
    {
        // laporan sederhana
        $totalLeaves = Leave::count();
        $totalAttendances = Attendance::count();

        return view('manager.reports.index', compact('totalLeaves', 'totalAttendances'));
    }
}
