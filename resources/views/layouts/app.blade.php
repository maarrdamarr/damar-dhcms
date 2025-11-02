<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Damar DHCMS' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @php
        $user = auth()->user();
        $role = $user->role ?? 'employee';

        // warna utama per role
        $roleColors = [
            'admin'   => ['#991b1b', '#fee2e2'],   // merah
            'hr'      => ['#6d28d9', '#ede9fe'],   // ungu
            'manager' => ['#166534', '#dcfce7'],   // hijau
            'employee'=> ['#1d4ed8', '#dbeafe'],   // biru
        ];

        [$roleColor, $roleSoft] = $roleColors[$role] ?? $roleColors['employee'];

        // nama cantik
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
        body {
            background:#f1f5f9;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background: #0f172a;
            min-height: 100vh;
            color: #fff;
            position: sticky;
            top: 0;
        }
        .sidebar .brand {
            background: rgba(0,0,0,.15);
            padding: .9rem 1rem .5rem 1rem;
        }
        .sidebar .role-badge{
            display: inline-block;
            background: rgba(255,255,255,.1);
            padding: .25rem .5rem;
            border-radius: 9999px;
            font-size: .65rem;
        }
        .sidebar a {
            color:#cbd5f5;
            display:block;
            text-decoration:none;
            padding:.50rem 1rem;
            font-size:.9rem;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background: rgba(255,255,255,.06);
            color: #fff;
        }
        .topbar {
            height:56px;
            background:#fff;
            border-bottom:1px solid #e2e8f0;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 1.25rem;
            gap:1rem;
        }
        .pill {
            background: var(--role-soft);
            color: var(--role-color);
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .35rem .75rem;
            border-radius: 9999px;
            font-size: .75rem;
            font-weight: 500;
        }
        .main-wrapper {
            flex:1;
            min-height:100vh;
        }
        .page-title{
            font-weight:600;
            font-size:1.25rem;
        }
        .mini-card{
            background:#fff;
            border-radius:.75rem;
            padding:1rem 1.25rem;
            box-shadow:0 10px 25px rgba(15,23,42,.05);
            border:1px solid rgba(148,163,184,.2);
        }
        .btn-role {
            background: var(--role-color);
            border: none;
        }
        .btn-role:hover {
            background: rgba(0,0,0,.25);
        }
        @media (max-width: 992px) {
            .sidebar { display:none; }
            body { display:block; }
        }
    </style>
</head>
<body class="d-flex">

    {{-- SIDEBAR --}}
    <aside class="sidebar d-flex flex-column">
        <div class="brand mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Damar DHCMS</span>
            </div>
            <div class="mt-2 small">
                <span class="role-badge">{{ $roleLabel }}</span>
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
            <a href="{{ route('manager.approvals') }}" class="{{ request()->routeIs('manager.approvals') ? 'active' : '' }}">✅ Approval Cuti</a>
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
               class="btn btn-sm w-100"
               style="background: rgba(248,113,113,.12); border:1px solid rgba(248,113,113,.4); color:#fff">🚪 Logout</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </aside>

    {{-- MAIN --}}
    <main class="main-wrapper d-flex flex-column">
        <div class="topbar">
            <div class="d-flex align-items-center gap-2">
                <div class="pill">
                    <span style="width:9px;height:9px;border-radius:9999px;background:var(--role-color);display:inline-block"></span>
                    {{ $roleLabel }}
                </div>
                <span class="text-muted small d-none d-md-inline">Damar DHCMS</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="text-end">
                    <div class="small fw-semibold">{{ $user->name ?? '' }}</div>
                    <div class="small text-muted">{{ $user->email ?? '' }}</div>
                </div>
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'Damar') }}&background=0f172a&color=fff&size=48"
                     alt="avatar" class="rounded-circle" width="38" height="38">
            </div>
        </div>

        <div class="p-4">
            @yield('content')
        </div>
    </main>
</body>
</html>
