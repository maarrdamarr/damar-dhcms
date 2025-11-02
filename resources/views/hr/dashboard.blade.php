@extends('layouts.app', ['title' => 'Dashboard HR'])

@section('content')
<h3 class="mb-3">Dashboard HR</h3>

<div class="row g-3">
  <div class="col-md-3">
    <div class="mini-card" style="border-left:4px solid var(--role-color);">
      <div class="small text-muted">Rekrutmen</div>
      <div class="fs-5 fw-semibold">Kelola Lowongan</div>
      <a href="{{ route('hr.recruitments') }}" class="small text-decoration-underline">Buka rekrutmen</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="mini-card">
      <div class="small text-muted">Karyawan</div>
      <div class="fs-5 fw-semibold">Data Karyawan</div>
      <a href="{{ route('hr.employees') }}" class="small text-decoration-underline">Lihat data</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="mini-card">
      <div class="small text-muted">Payroll</div>
      <div class="fs-5 fw-semibold">Proses Gaji</div>
      <a href="{{ route('hr.payrolls') }}" class="small text-decoration-underline">Buka payroll</a>
    </div>
  </div>
</div>
@endsection
