@extends('layouts.app', ['title' => 'User Management'])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>User Management</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Telp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role }}</td>
                <td>{{ $u->phone }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
