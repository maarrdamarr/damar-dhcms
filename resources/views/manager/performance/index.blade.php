@extends('layouts.app', ['title' => 'Penilaian Kinerja'])

@section('content')
<h4 class="mb-3">Penilaian Kinerja</h4>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="" method="POST" class="row g-2 mb-4">
    @csrf
    <div class="col-md-3">
        <label class="form-label">ID Karyawan</label>
        <input type="number" name="employee_id" class="form-control" placeholder="misal: 4" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Skor</label>
        <input type="number" name="score" class="form-control" value="80" min="0" max="100" required>
    </div>
    <div class="col-md-5">
        <label class="form-label">Catatan</label>
        <input type="text" name="notes" class="form-control" placeholder="Rajin, perlu training, dst">
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-primary w-100">Simpan</button>
    </div>
</form>

<table class="table table-sm">
    <thead>
        <tr>
            <th>Karyawan</th>
            <th>Skor</th>
            <th>Catatan</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reviews as $rev)
            <tr>
                <td>{{ $rev->employee?->name ?? $rev->employee_id }}</td>
                <td>{{ $rev->score }}</td>
                <td>{{ $rev->notes }}</td>
                <td>{{ $rev->created_at }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada penilaian.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
