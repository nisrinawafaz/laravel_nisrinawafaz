<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="min-height:100vh;">
  <div class="card shadow-sm border rounded w-100" style="max-width: 420px;">
    <div class="card-body p-4">
      <div class="text-center mb-4">
        <h2 class="fw-bold text-success">Selamat Datang!</h2>
        <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
      </div>

      @if ($errors->has('errorLogin'))
        <div class="alert alert-danger py-1" style="font-size: 14px; text-align: center;">
          {{ $errors->first('errorLogin') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label for="username" class="form-label fw-medium" style="font-size: 14px;">Username</label>
          <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" style="font-size: 14px;"
            value="{{ old('username') }}" autofocus>
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-medium" style="font-size: 14px;">Password</label>
          <input type="password" name="password" id="password"
            class="form-control @error('password') is-invalid @enderror" style="font-size: 14px;">
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" style="font-size: 14px;" for="remember">Remember me</label>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-custom-green">Login</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>