@extends('layouts.app', ['title' => 'Admin Dashboard'])

@section('content')
<h3 class="mb-3">Admin Dashboard</h3>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="mb-1">User Management</h6>
                <p class="text-muted mb-2">Tambah & atur akun.</p>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">Buka</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="mb-1">System Settings</h6>
                <a href="{{ route('admin.settings') }}" class="btn btn-sm btn-outline-secondary">Buka</a>
            </div>
        </div>
    </div>
</div>
@endsection
