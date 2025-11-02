@extends('layouts.app', ['title' => 'Laporan Manager'])

@section('content')
<h4 class="mb-3">Laporan Singkat</h4>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="mb-1">Total Pengajuan Cuti</h6>
                <div class="fs-4">{{ $totalLeaves }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="mb-1">Total Absensi Tercatat</h6>
                <div class="fs-4">{{ $totalAttendances }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
