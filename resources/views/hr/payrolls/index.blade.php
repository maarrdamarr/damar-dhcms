@extends('layouts.app', ['title' => 'Payroll'])

@section('content')
<h4 class="mb-3">Payroll</h4>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('hr.payrolls.generate') }}" method="POST" class="row g-2 mb-4">
    @csrf
    <div class="col-md-3">
        <label class="form-label">Karyawan</label>
        <select name="employee_id" class="form-select" required>
            <option value="">-- pilih --</option>
            @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->name }} ({{ $e->email }})</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <label class="form-label">Periode</label>
        <input type="month" name="period_month" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Gaji Pokok</label>
        <input type="number" name="basic_salary" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Tunjangan</label>
        <input type="number" name="allowance" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">Potongan</label>
        <input type="number" name="deduction" class="form-control">
    </div>
    <div class="col-md-1 d-flex align-items-end">
        <button class="btn btn-primary w-100">OK</button>
    </div>
</form>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Karyawan</th>
            <th>Periode</th>
            <th>Gaji</th>
            <th>THP</th>
            <th>Distribusi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($payrolls as $p)
            <tr>
                <td>{{ $p->employee?->name ?? '-' }}</td>
                <td>{{ $p->period_month }}</td>
                <td>Rp {{ number_format($p->basic_salary,0,',','.') }}</td>
                <td><strong>Rp {{ number_format($p->net_salary,0,',','.') }}</strong></td>
                <td>{{ $p->is_distributed ? 'Ya' : 'Belum' }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada payroll.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
