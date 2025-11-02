<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RoleController;
use App\Models\AuditLog;

class AuditController extends RoleController
{
    protected string $mustRole = 'admin';

    public function index()
    {
        $audits = AuditLog::with('user')->latest()->get();
        return view('admin.audits.index', compact('audits'));
    }
}
