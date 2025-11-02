<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Damar DHCMS' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background:#f1f5f9; }
        .sidebar { width: 230px; background:#0f172a; min-height:100vh; color:#fff; }
        .sidebar a { color:#cbd5f5; display:block; padding:.55rem 1rem; text-decoration:none; font-size:.9rem; }
        .sidebar a.active, .sidebar a:hover { background:rgba(255,255,255,.1); color:#fff; }
        .topbar { height:56px; background:#fff; border-bottom:1px solid #e2e8f0; }
    </style>
</head>
<body class="d-flex">

    <aside class="sidebar">
        <div class="p-3 fw-bold">Damar DHCMS</div>

        @php $r = auth()->user()->role ?? 'employee'; @endphp

        @if($r === 'employee')
            <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.*') ? 'active' : '' }}">🏡 Dashboard</a>
            <a href="{{ route('employee.profile') }}">👤 Profil</a>
            <a href="{{ route('employee.attendance') }}">🕒 Absensi</a>
            <a href="{{ route('employee.leaves') }}">📝 Cuti</a>
            <a href="{{ route('employee.salary') }}">💰 Slip Gaji</a>
        @elseif($r === 'manager')
            <a href="{{ route('manager.dashboard') }}">🏡 Dashboard</a>
            <a href="{{ route('manager.team') }}">👥 Tim</a>
            <a href="{{ route('manager.approvals') }}">✅ Approval</a>
            <a href="{{ route('manager.performance') }}">📊 Penilaian</a>
            <a href="{{ route('manager.reports') }}">📑 Laporan</a>
        @elseif($r === 'hr')
            <a href="{{ route('hr.dashboard') }}">🏡 Dashboard</a>
            <a href="{{ route('hr.recruitments') }}">📢 Rekrutmen</a>
            <a href="{{ route('hr.employees') }}">📂 Data Karyawan</a>
            <a href="{{ route('hr.payrolls') }}">💵 Payroll</a>
            <a href="{{ route('hr.trainings') }}">🎓 Training</a>
        @else
            <a href="{{ route('admin.dashboard') }}">🏡 Dashboard</a>
            <a href="{{ route('admin.users.index') }}">👤 User Management</a>
            <a href="{{ route('admin.settings') }}">⚙️ System Config</a>
            <a href="{{ route('admin.backups') }}">🗄 Backup</a>
            <a href="{{ route('admin.audits') }}">📜 Audit Log</a>
        @endif

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="mt-3">🚪 Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </aside>

    <main class="flex-fill">
        <div class="topbar d-flex align-items-center justify-content-between px-3">
            <div>{{ $title ?? 'Damar DHCMS' }}</div>
            <div>Halo, {{ auth()->user()->name ?? '' }} ({{ auth()->user()->role ?? '' }})</div>
        </div>
        <div class="p-4">
            @yield('content')
        </div>
    </main>
</body>
</html>
