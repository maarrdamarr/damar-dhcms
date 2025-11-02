@extends('layouts.app', ['title' => 'Data Karyawan'])

@section('content')
<h4 class="mb-3">Data Karyawan</h4>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Tanggal Masuk</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employees as $emp)
            <tr>
                <td>{{ $emp->employee_code }}</td>
                <td>{{ $emp->user?->name ?? '-' }}</td>
                <td>{{ $emp->position }}</td>
                <td>{{ $emp->join_date }}</td>
                <td>{{ $emp->status }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
