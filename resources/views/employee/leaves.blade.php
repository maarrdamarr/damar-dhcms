@extends('layouts.app', ['title' => 'Pengajuan Cuti'])

@section('content')
<h4 class="mb-3">Pengajuan Cuti</h4>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('employee.leaves.store') }}" method="POST" class="row g-2 mb-4">
    @csrf
    <div class="col-md-3">
        <label class="form-label">Mulai</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Selesai</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Alasan</label>
        <input type="text" name="reason" class="form-control" placeholder="Misal: Sakit" required>
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-primary w-100">Kirim</button>
    </div>
</form>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Selesai</th>
            <th>Alasan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($leaves as $leave)
            <tr>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->reason }}</td>
                <td>
                    @if($leave->status == 'approved')
                        <span class="badge text-bg-success">Disetujui</span>
                    @elseif($leave->status == 'rejected')
                        <span class="badge text-bg-danger">Ditolak</span>
                    @else
                        <span class="badge text-bg-warning text-dark">Menunggu</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada pengajuan</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
