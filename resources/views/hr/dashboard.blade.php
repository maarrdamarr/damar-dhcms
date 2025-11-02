@extends('layouts.app', ['title' => 'Dashboard HR'])

@section('content')
<h3>Dashboard HR</h3>
<p>Menu cepat:</p>
<ul>
    <li><a href="{{ route('hr.recruitments') }}">Kelola Rekrutmen</a></li>
    <li><a href="{{ route('hr.employees') }}">Database Karyawan</a></li>
    <li><a href="{{ route('hr.payrolls') }}">Proses Payroll</a></li>
    <li><a href="{{ route('hr.trainings') }}">Program Training</a></li>
</ul>
@endsection
