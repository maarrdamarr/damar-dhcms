@extends('layouts.app', ['title' => 'Audit Log'])

@section('content')

<h4 class="mb-3">Audit Log</h4>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Waktu</th>
            <th>User</th>
            <th>Aksi</th>
            <th>Payload</th>
        </tr>
    </thead>
    <tbody>
        @forelse($audits as $a)
            <tr>
                <td>{{ $a->created_at }}</td>
                <td>{{ $a->user?->name ?? '-' }}</td>
                <td>{{ $a->action }}</td>
                <td><code>{{ Str::limit($a->payload, 80) }}</code></td>
            </tr>
        @empty
            <tr><td colspan="4">Log kosong.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
