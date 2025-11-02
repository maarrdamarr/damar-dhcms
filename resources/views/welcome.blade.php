<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Damar DHCMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh">
  <div class="container text-center">
    <h1 class="mb-3">Damar DHCMS</h1>
    <p class="mb-4">Human Capital Management System - Laravel 12 + Laragon</p>
    @auth
      <a href="{{ route('dashboard') }}" class="btn btn-primary">Masuk Dashboard</a>
    @else
      <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endauth
  </div>
</body>
</html>
