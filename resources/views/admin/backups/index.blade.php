@extends('layouts.app', ['title' => 'Backups'])

@section('content')
<h4 class="mb-3">Daftar Backup</h4>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>File</th>
            <th>Path</th>
            <th>Ukuran</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
        @forelse($backups as $b)
            <tr>
                <td>{{ $b->file_name }}</td>
                <td>{{ $b->path }}</td>
                <td>{{ $b->size }} bytes</td>
                <td>{{ $b->created_at }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada backup.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
