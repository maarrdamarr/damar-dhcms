@extends('layouts.app', ['title' => 'Dashboard Manager'])

@section('content')
<h3 class="mb-3">Dashboard Manager</h3>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="mb-1">Approval Cuti</h6>
                <p class="text-muted mb-2">Lihat pengajuan karyawan mu.</p>
                <a href="{{ route('manager.approvals') }}" class="btn btn-sm btn-primary">Lihat</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="mb-1">Tim</h6>
                <p class="text-muted mb-2">Daftar anggota tim.</p>
                <a href="{{ route('manager.team') }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
            </div>
        </div>
    </div>
</div>
@endsection
