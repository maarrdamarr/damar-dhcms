<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth::user();

        return match ($user->role) {
            'admin'   => view('admin.dashboard', compact('user')),
            'hr'      => view('hr.dashboard', compact('user')),
            'manager' => view('manager.dashboard', compact('user')),
            default   => view('employee.dashboard', compact('user')),
        };
    }
}
