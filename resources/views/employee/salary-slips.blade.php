@extends('layouts.app', ['title' => 'Slip Gaji'])

@section('content')
<h4 class="mb-3">Slip Gaji</h4>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Periode</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Potongan</th>
            <th>Take Home Pay</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($slips as $slip)
            <tr>
                <td>{{ $slip->period_month }}</td>
                <td>Rp {{ number_format($slip->basic_salary,0,',','.') }}</td>
                <td>Rp {{ number_format($slip->allowance,0,',','.') }}</td>
                <td>Rp {{ number_format($slip->deduction,0,',','.') }}</td>
                <td><strong>Rp {{ number_format($slip->net_salary,0,',','.') }}</strong></td>
                <td>
                    @if($slip->is_distributed)
                        <span class="badge text-bg-success">Diterbitkan</span>
                    @else
                        <span class="badge text-bg-secondary">Draft</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Belum ada slip gaji</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
