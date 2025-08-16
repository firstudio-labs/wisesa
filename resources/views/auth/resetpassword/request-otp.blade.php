<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Linkskuy - Request OTP</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('linkskuy') }}/assets/images/logo.ico" type="image/x-icon">

  <!-- custom css link -->
  <link rel="stylesheet" href="{{ asset('linkskuy') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('linkskuy') }}/assets/css/authstyle.css">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- #MAIN -->
  <main>
    <!-- Request OTP Container -->
    <div class="login-container">
      <!-- Request OTP Form -->
      <div class="login-form-container">
        <div class="form-header">
          <div class="reset-icon">
            <ion-icon name="key-outline" style="font-size: 48px; color: #667eea;"></ion-icon>
          </div>
          <h2 class="form-title">Reset Password</h2>
          <p class="form-subtitle">Masukkan nomor WhatsApp yang terdaftar untuk menerima kode OTP</p>
        </div>

        <form class="login-form" action="{{ route('forgot-password.request-otp') }}" method="POST">
          @csrf
          <!-- WhatsApp Number Field -->
          <div class="form-group">
            <label for="no_wa" class="form-label">
              <ion-icon name="logo-whatsapp"></ion-icon>
              Nomor WhatsApp
            </label>
            <input type="tel" id="no_wa" name="no_wa" class="form-input"
              placeholder="Contoh: 08123456789" required>
            <small class="form-help">Masukkan nomor WhatsApp yang terdaftar di akun Anda</small>
          </div>

          <!-- Request OTP Button -->
          <button type="submit" class="button-custom-shine"
            style="padding: 8px 18px; background-color: #667eea; color: #fff; border-radius: 6px; border: 2px solid #222; font-size: 1rem; font-family: inherit; cursor: pointer; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.07); transition: background 0.2s, color 0.2s, box-shadow 0.2s; display: flex; justify-content: center; align-items: center; text-align: center; width: 100%;">
            Kirim Kode OTP
          </button>

          <!-- Back to Login Link -->
          <div class="register-section">
            <p>Ingat password? <a href="{{ route('login') }}" class="register-link">Masuk sekarang</a></p>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!-- custom js link -->
  <script src="{{ asset('linkskuy') }}/assets/js/reset.js"></script>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons/5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- SweetAlert -->
  @include('sweetalert::alert')
</body>

</html>