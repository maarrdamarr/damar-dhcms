<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RoleController;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemController extends RoleController
{
    protected string $mustRole = 'admin';

    public function index()
    {
        $settings = SystemSetting::orderBy('key')->get();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key'   => 'required',
            'value' => 'nullable',
        ]);

        SystemSetting::updateOrCreate(
            ['key' => $data['key']],
            ['value' => $data['value']]
        );

        return back()->with('success', 'Setting disimpan.');
    }
}
