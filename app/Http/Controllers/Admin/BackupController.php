<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RoleController;
use App\Models\Backup;

class BackupController extends RoleController
{
    protected string $mustRole = 'admin';

    public function index()
    {
        $backups = Backup::latest()->get();
        return view('admin.backups.index', compact('backups'));
    }
}
