@extends('layouts.app', ['title' => 'System Settings'])

@section('content')
<h4 class="mb-3">System Settings</h4>

<form action="{{ route('admin.settings') }}" method="POST" class="row g-2 mb-4">
    @csrf
    <div class="col-md-3">
        <label class="form-label">Key</label>
        <input type="text" name="key" class="form-control" placeholder="app_name" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Value</label>
        <input type="text" name="value" class="form-control" placeholder="Damar DHCMS">
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-primary w-100">Simpan</button>
    </div>
</form>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Key</th>
            <th>Value</th>
            <th>Diuabah</th>
        </tr>
    </thead>
    <tbody>
        @forelse($settings as $s)
            <tr>
                <td>{{ $s->key }}</td>
                <td>{{ $s->value }}</td>
                <td>{{ $s->updated_at }}</td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada setting.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
