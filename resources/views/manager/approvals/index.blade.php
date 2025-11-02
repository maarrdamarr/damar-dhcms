@extends('layouts.app', ['title' => 'Approval Cuti'])

@section('content')
<h4>Approval Cuti</h4>

<table class="table table-bordered table-sm mt-3">
    <thead>
        <tr>
            <th>Karyawan</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($leaves as $leave)
        <tr>
            <td>{{ $leave->user->name }}</td>
            <td>{{ $leave->start_date }}</td>
            <td>{{ $leave->end_date }}</td>
            <td>{{ $leave->reason }}</td>
            <td>{{ $leave->status }}</td>
            <td class="d-flex gap-1">
                <form action="{{ route('manager.approvals.approve', $leave) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm">Setujui</button>
                </form>
                <form action="{{ route('manager.approvals.reject', $leave) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm">Tolak</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">Tidak ada pengajuan.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
