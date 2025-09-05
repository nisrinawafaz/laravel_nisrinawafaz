<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Data Rumah Sakit')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="sidebar">
    <div>
      <div class="logo-container">
        <i class="fas fa-hospital-alt" style="color: var(--primary-green); font-size: 2rem;"></i>
      </div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('hospitals.*') ? 'active' : '' }}"
            href="{{ route('hospitals.index') }}">
            <i class="fas fa-hospital icon"></i>
            Rumah Sakit
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('patients.*') ? 'active' : '' }}"
            href="{{ route('patients.index') }}">
            <i class="fas fa-users icon"></i>
            Pasien
          </a>
        </li>
      </ul>
    </div>

    <div class="logout-section">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-custom-yellow w-100">
          <i class="fas fa-sign-out-alt me-2"></i>
          Logout
        </button>
      </form>
    </div>
  </nav>

  <div class="main-content">
    @if(session('ok'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('ok') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @yield('content')
  </div>

  <script>
    if (typeof jQuery !== 'undefined') {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    } else {
      console.warn("jQuery is not loaded. AJAX CSRF setup might not work.");
    }
  </script>

  @stack('scripts')
</body>

</html>