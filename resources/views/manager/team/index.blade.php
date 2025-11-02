@extends('layouts.app', ['title' => 'Tim Saya'])

@section('content')
<h4 class="mb-3">Anggota Tim</h4>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @forelse($members as $m)
            <tr>
                <td>{{ $m->employee?->name ?? $m->employee?->email ?? '-' }}</td>
                <td>{{ $m->employee?->email ?? '-' }}</td>
            </tr>
        @empty
            <tr><td colspan="2">Belum ada anggota tim.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
