@extends('layouts.app', ['title' => 'Absensi'])

@section('content')
<h4 class="mb-3">Absensi Harian</h4>

<form action="{{ route('employee.attendance.store') }}" method="POST" class="mb-4">
    @csrf
    <button class="btn btn-primary">Klik untuk Absen Masuk / Pulang</button>
</form>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Masuk</th>
            <th>Pulang</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($attendances ?? [] as $att)
            <tr>
                <td>{{ $att->attend_date }}</td>
                <td>{{ $att->check_in }}</td>
                <td>{{ $att->check_out }}</td>
                <td>{{ $att->note }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
