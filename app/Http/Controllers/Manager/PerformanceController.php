<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\RoleController;
use App\Models\PerformanceReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends RoleController
{
    protected string $mustRole = 'manager';

    public function index()
    {
        $reviews = PerformanceReview::where('manager_id', Auth::id())
            ->latest()
            ->get();

        return view('manager.performance.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer',
            'score'       => 'required|integer|min:0|max:100',
            'notes'       => 'nullable|string',
        ]);

        $data['manager_id'] = Auth::id();

        PerformanceReview::create($data);

        return back()->with('success', 'Penilaian disimpan.');
    }
}
