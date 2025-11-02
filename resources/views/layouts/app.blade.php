<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Damar DHCMS' }}</title>

    {{-- PAKAI CDN DULU, BUKAN VITE --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @php
        $user = auth()->user();
        $role = $user->role ?? 'employee';

        $roleColors = [
            'admin'   => ['#991b1b', '#fee2e2'],
            'hr'      => ['#6d28d9', '#ede9fe'],
            'manager' => ['#166534', '#dcfce7'],
            'employee'=> ['#1d4ed8', '#dbeafe'],
        ];
        [$roleColor, $roleSoft] = $roleColors[$role] ?? $roleColors['employee'];

        $roleLabels = [
            'admin'   => 'Administrator',
            'hr'      => 'Human Resource',
            'manager' => 'Manager',
            'employee'=> 'Employee',
        ];
        $roleLabel = $roleLabels[$role] ?? $role;
    @endphp

    <style>
        :root{
            --role-color: {{ $roleColor }};
            --role-soft: {{ $roleSoft }};
        }
        body { background:#f1f5f9; min-height:100vh; }
        .sidebar { width:240px; background:#0f172a; min-height:100vh; color:#fff; position:sticky; top:0; }
        .sidebar .brand { background:rgba(0,0,0,.12); padding:.9rem 1rem .5rem 1rem; }
        .sidebar a { color:#cbd5f5; display:block; padding:.5rem 1rem; text-decoration:none; font-size:.9rem; }
        .sidebar a.active, .sidebar a:hover { background:rgba(255,255,255,.05); color:#fff; }
        .topbar { height:56px; background:#fff; border-bottom:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center; padding:0 1.25rem; }
        .pill { background:var(--role-soft); color:var(--role-color); padding:.25rem .7rem; border-radius:999px; font-size:.75rem; }
        .mini-card{ background:#fff; border-radius:.75rem; padding:1rem 1.25rem; box-shadow:0 10px 25px rgba(15,23,42,.05); border:1px solid rgba(148,163,184,.2); }
        @media(max-width:992px){ .sidebar{display:none;} body{display:block;} }
    </style>
</head>
<body class="d-flex">

    <aside class="sidebar d-flex flex-column">
        <div class="brand">
            <div class="fw-semibold">Damar DHCMS</div>
            <div class="small mt-1" style="background:rgba(255,255,255,.08);display:inline-block;padding:.2rem .5rem;border-radius:99px;">
                {{ $roleLabel }}
            </div>
        </div>

        @if($role === 'employee')
            <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">🏡 Dashboard</a>
            <a href="{{ route('employee.profile') }}" class="{{ request()->routeIs('employee.profile') ? 'active' : '' }}">👤 Profil</a>
            <a href="{{ route('employee.attendance') }}" class="{{ request()->routeIs('employee.attendance') ? 'active' : '' }}">🕒 Absensi</a>
            <a href="{{ route('employee.leaves') }}" class="{{ request()->routeIs('employee.leaves') ? 'active' : '' }}">📝 Cuti</a>
            <a href="{{ route('employee.salary') }}" class="{{ request()->routeIs('employee.salary') ? 'active' : '' }}">💰 Slip Gaji</a>
        @elseif($role === 'manager')
            <a href="{{ route('manager.dashboard') }}" class="{{ request()->routeIs('manager.dashboard') ? 'active' : '' }}">🏡 Dashboard</a>
            <a href="{{ route('manager.team') }}" class="{{ request()->routeIs('manager.team') ? 'active' : '' }}">👥 Tim</a>
            <a href="{{ route('manager.approvals') }}" class="{{ request()->routeIs('manager.approvals') ? 'active' : '' }}">✅ Approval</a>
            <a href="{{ route('manager.performance') }}" class="{{ request()->routeIs('manager.performance') ? 'active' : '' }}">📊 Penilaian</a>
            <a href="{{ route('manager.reports') }}" class="{{ request()->routeIs('manager.reports') ? 'active' : '' }}">📑 Laporan</a>
        @elseif($role === 'hr')
            <a href="{{ route('hr.dashboard') }}" class="{{ request()->routeIs('hr.dashboard') ? 'active' : '' }}">🏡 Dashboard</a>
            <a href="{{ route('hr.recruitments') }}" class="{{ request()->routeIs('hr.recruitments') ? 'active' : '' }}">📢 Rekrutmen</a>
            <a href="{{ route('hr.employees') }}" class="{{ request()->routeIs('hr.employees') ? 'active' : '' }}">📂 Data Karyawan</a>
            <a href="{{ route('hr.payrolls') }}" class="{{ request()->routeIs('hr.payrolls') ? 'active' : '' }}">💵 Payroll</a>
            <a href="{{ route('hr.trainings') }}" class="{{ request()->routeIs('hr.trainings') ? 'active' : '' }}">🎓 Training</a>
        @else
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">🏡 Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">👤 User Management</a>
            <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">⚙️ System Config</a>
            <a href="{{ route('admin.backups') }}" class="{{ request()->routeIs('admin.backups') ? 'active' : '' }}">🗄 Backup</a>
            <a href="{{ route('admin.audits') }}" class="{{ request()->routeIs('admin.audits') ? 'active' : '' }}">📜 Audit Log</a>
        @endif

        <div class="mt-auto mb-3 px-3">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-sm w-100 btn-danger">Logout</a>
        </div>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">@csrf</form>
    </aside>

    <main class="flex-fill d-flex flex-column">
        <div class="topbar">
            <div class="pill">{{ $roleLabel }}</div>
            <div class="small text-muted">{{ $user->name ?? '' }}</div>
        </div>
        <div class="p-4">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
