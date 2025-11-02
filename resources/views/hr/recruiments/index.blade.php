@extends('layouts.app', ['title' => 'Rekrutmen'])

@section('content')
<h4 class="mb-3">Lowongan & Kandidat</h4>

<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <h6 class="mb-2">Buat Lowongan</h6>
                <form action="{{ url('hr/recruitments') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h6>Daftar Lowongan</h6>
        <table class="table table-sm mb-4">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->status }}</td>
                        <td>{{ $job->created_at }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">Belum ada lowongan.</td></tr>
                @endforelse
            </tbody>
        </table>

        <h6>Kandidat</h6>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Lamaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($candidates as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->job?->title ?? '-' }}</td>
                        <td>{{ $c->status }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">Belum ada kandidat.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
