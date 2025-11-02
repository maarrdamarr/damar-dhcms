@extends('layouts.app', ['title' => 'Dashboard Manager'])

@section('content')
<h3 class="mb-3">Dashboard Manager</h3>
<p class="text-muted mb-3">Pantau pengajuan cuti dan tim.</p>

<div class="row g-3">
  <div class="col-md-4">
    <div class="mini-card" style="border-left:4px solid var(--role-color);">
      <div class="small text-muted">Approval</div>
      <div class="fs-5 fw-semibold">Pengajuan Cuti</div>
      <a href="{{ route('manager.approvals') }}" class="small text-decoration-underline">Lihat daftar</a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="mini-card">
      <div class="small text-muted">Tim</div>
      <div class="fs-5 fw-semibold">Anggota Tim</div>
      <a href="{{ route('manager.team') }}" class="small text-decoration-underline">Lihat tim</a>
    </div>
  </div>
</div>
@endsection
