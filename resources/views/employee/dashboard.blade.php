@extends('layouts.app', ['title' => 'Dashboard Karyawan'])

@section('content')
<h3 class="mb-3">Dashboard Karyawan</h3>
<div class="row g-3">
  <div class="col-md-3">
    <div class="mini-card" style="border-left:4px solid var(--role-color);">
      <div class="small text-muted">Absensi</div>
      <div class="fs-5 fw-semibold">Hari ini</div>
      <a href="{{ route('employee.attendance') }}" class="small text-decoration-underline">Isi absensi</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="mini-card">
      <div class="small text-muted">Cuti</div>
      <div class="fs-5 fw-semibold">Ajukan Cuti</div>
      <a href="{{ route('employee.leaves') }}" class="small text-decoration-underline">Lihat pengajuan</a>
    </div>
  </div>
</div>
@endsection
