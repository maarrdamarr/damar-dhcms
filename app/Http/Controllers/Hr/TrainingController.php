<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\RoleController;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends RoleController
{
    protected string $mustRole = 'hr';

    public function index()
    {
        $trainings = Training::latest()->get();

        return view('hr.trainings.index', compact('trainings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required',
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date',
            'description'=> 'nullable',
        ]);

        Training::create($data);

        return back()->with('success', 'Training ditambahkan.');
    }
}
