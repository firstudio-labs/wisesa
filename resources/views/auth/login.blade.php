<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Linkskuy - Login</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('linkskuy') }}/assets/images/logo.ico" type="image/x-icon">

  <!-- custom css link -->
  <link rel="stylesheet" href="{{ asset('linkskuy') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('linkskuy') }}/assets/css/authstyle.css">
  
  <style>
    .error-message {
      color: #dc3545;
      font-size: 0.875rem;
      margin-top: 5px;
      display: block;
    }
    
    .is-invalid {
      border-color: #dc3545 !important;
    }
    
    .alert {
      margin-bottom: 20px;
    }
  </style>

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- #MAIN -->
  <main>
    <!-- Login Container -->
    <div class="login-container">
      <!-- Login Form -->
      <div class="login-form-container">
        <div class="form-header">
          <h2 class="form-title">Selamat Datang Kembali!</h2>
          <p class="form-subtitle">Masuk ke akun Linkskuy Anda</p>
        </div>

        <!-- Google Login Button -->
        <a href="{{ route('google.login') }}" class="button-custom-shine"
          style="padding: 8px 18px; background-color: #ffffff; color: #000000; border-radius: 6px; border: 2px solid #222; font-size: 1rem; font-family: inherit; cursor: pointer; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.07); transition: background 0.2s, color 0.2s, box-shadow 0.2s; display: flex; justify-content: center; align-items: center; text-align: center; width: 100%; margin-bottom: 20px;">
          <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google" class="google-icon">
          Masuk dengan Google
        </a>

        <!-- Divider -->
        <div class="divider">
          <span>atau</span>
        </div>

        <form method="POST" action="{{ route('login') }}" class="login-form">
          @csrf
          
          @if ($errors->any())
            <div class="alert alert-danger" style="background-color: #fee; border: 1px solid #fcc; color: #c33; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
              <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
          <!-- Username Field -->
          <div class="form-group">
            <label for="username" class="form-label">
              <ion-icon name="person-outline"></ion-icon>
              Username atau Email
            </label>
            <input type="text" id="username" name="username" class="form-input @error('username') is-invalid @enderror"
              placeholder="Masukkan username atau email" value="{{ old('username') }}" required>
            @error('username')
              <small class="error-message">{{ $message }}</small>
            @enderror
          </div>

          <!-- Password Field -->
          <div class="form-group">
            <label for="password" class="form-label">
              <ion-icon name="lock-closed-outline"></ion-icon>
              Password
            </label>
            <div class="password-input-group">
              <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror" placeholder="Masukkan password"
                required>
              <button type="button" class="password-toggle" data-password-toggle
                aria-label="Toggle password visibility">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
            </div>
            @error('password')
              <small class="error-message">{{ $message }}</small>
            @enderror
          </div>

          <!-- Remember Me & Forgot Password -->
          <div class="form-options">
            <label class="checkbox-container">
              <input type="checkbox" id="remember-me" name="remember-me">
              <span class="checkmark"></span>
              Ingat saya
            </label>
            <a href="{{ route('forgot-password') }}" class="forgot-password">Lupa password?</a>
          </div>

          <!-- Login Button -->
          <button type="submit" class="button-custom-shine"
            style="padding: 8px 18px; background-color: #22c44d; color: #fff; border-radius: 6px; border: 2px solid #222; font-size: 1rem; font-family: inherit; cursor: pointer; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.07); transition: background 0.2s, color 0.2s, box-shadow 0.2s; display: flex; justify-content: center; align-items: center; text-align: center; width: 100%;">
            Masuk
          </button>

          <!-- Register Link -->
          <div class="register-section">
            <p>Belum punya akun? <a href="{{ route('register') }}" class="register-link">Daftar sekarang</a></p>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!-- custom js link -->
  <script src="{{ asset('linkskuy') }}/assets/js/auth.js"></script>
  @include('sweetalert::alert')
  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons/5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>