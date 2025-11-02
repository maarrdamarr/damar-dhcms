@extends('layouts.app', ['title' => 'Dashboard Admin'])

@section('content')
<h3 class="mb-3">Dashboard Admin</h3>
<p class="text-muted mb-3">Kelola user, setting sistem, dan audit log.</p>

<div class="row g-3">
  <div class="col-md-3">
    <div class="mini-card" style="border-left:4px solid var(--role-color);">
      <div class="small text-muted">User</div>
      <div class="fs-5 fw-semibold">User Management</div>
      <a href="{{ route('admin.users.index') }}" class="small text-decoration-underline">Lihat user</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="mini-card">
      <div class="small text-muted">System</div>
      <div class="fs-5 fw-semibold">Pengaturan</div>
      <a href="{{ route('admin.settings') }}" class="small text-decoration-underline">Buka settings</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="mini-card">
      <div class="small text-muted">Log</div>
      <div class="fs-5 fw-semibold">Audit Log</div>
      <a href="{{ route('admin.audits') }}" class="small text-decoration-underline">Lihat log</a>
    </div>
  </div>
</div>
@endsection
