<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\RoleController;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamController extends RoleController
{
    protected string $mustRole = 'manager';

    public function index()
    {
        $members = Team::with('employee')
            ->where('manager_id', Auth::id())
            ->get();

        return view('manager.team.index', compact('members'));
    }
}
