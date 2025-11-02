<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\RoleController;
use App\Models\HrJob;
use App\Models\Candidate;
use Illuminate\Http\Request;

class RecruitmentController extends RoleController
{
    protected string $mustRole = 'hr';

    public function index()
    {
        $jobs = HrJob::latest()->get();
        $candidates = Candidate::with('job')->latest()->get();

        return view('hr.recruitments.index', compact('jobs', 'candidates'));
    }

    public function storeJob(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
        ]);

        HrJob::create($data);

        return back()->with('success', 'Lowongan dibuat.');
    }
}
