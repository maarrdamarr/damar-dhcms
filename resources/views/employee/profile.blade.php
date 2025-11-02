@extends('layouts.app', ['title' => 'Profil Saya'])

@section('content')
<h4 class="mb-3">Profil Karyawan</h4>

<div class="card border-0 shadow-sm" style="max-width: 520px">
    <div class="card-body">
        <div class="mb-2"><strong>Nama:</strong> {{ $user->name }}</div>
        <div class="mb-2"><strong>Email:</strong> {{ $user->email }}</div>
        <div class="mb-2"><strong>Role:</strong> {{ $user->role }}</div>
        <div class="mb-2"><strong>No. Telp:</strong> {{ $user->phone ?? '-' }}</div>
        <hr>
        <p class="text-muted mb-0">Data profil diambil dari tabel <code>users</code>.</p>
    </div>
</div>
@endsection
