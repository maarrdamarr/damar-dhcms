@extends('layouts.app', ['title' => 'Training'])

@section('content')
<h4 class="mb-3">Program Training</h4>

<form action="" method="POST" class="row g-2 mb-4">
    @csrf
    <div class="col-md-4">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Mulai</label>
        <input type="date" name="start_date" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">Selesai</label>
        <input type="date" name="end_date" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Deskripsi</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="col-md-1 d-flex align-items-end">
        <button class="btn btn-primary w-100">+</button>
    </div>
</form>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Waktu</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($trainings as $t)
            <tr>
                <td>{{ $t->title }}</td>
                <td>{{ $t->start_date }} - {{ $t->end_date }}</td>
                <td>{{ $t->description }}</td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada training.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
