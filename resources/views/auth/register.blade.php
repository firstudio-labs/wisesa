<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkskuy - Register</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- #MAIN -->
    <main>
        <!-- Register Container -->
        <div class="login-container">
            <!-- Register Form -->
            <div class="login-form-container">
                <div class="form-header">
                    <h2 class="form-title">Buat Akun Baru</h2>
                    <p class="form-subtitle">Daftar ke Linkskuy untuk mulai membuat link keren</p>
                </div>

                <!-- Google Register Button -->
                <a href="{{ route('google.login') }}" class="button-custom-shine"
                    style="padding: 8px 18px; background-color: #ffffff; color: #000000; border-radius: 6px; border: 2px solid #222; font-size: 1rem; font-family: inherit; cursor: pointer; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.07); transition: background 0.2s, color 0.2s, box-shadow 0.2s; display: flex; justify-content: center; align-items: center; text-align: center; width: 100%; margin-bottom: 20px;">
                    <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google"
                        class="google-icon">
                    Daftar dengan Google
                </a>

                <!-- Divider -->
                <div class="divider">
                    <span>atau</span>
                </div>

                <form method="POST" action="{{ route('register') }}" class="login-form">
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
                    
                    <!-- Nama Lengkap Field -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <ion-icon name="person-outline"></ion-icon>
                            Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" class="form-input @error('name') is-invalid @enderror"
                            placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                        @error('name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Username Field -->
                    <div class="form-group">
                        <label for="username" class="form-label">
                            <ion-icon name="at-outline"></ion-icon>
                            Username
                        </label>
                        <input type="text" id="username" name="username" class="form-input @error('username') is-invalid @enderror"
                            placeholder="Buat username unik" value="{{ old('username') }}" required>
                        <small class="form-help">Username akan digunakan untuk login dan URL profil Anda</small>
                        @error('username')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <!-- WhatsApp Number Field -->
                    <div class="form-group">
                        <label for="no_wa" class="form-label">
                            <ion-icon name="logo-whatsapp"></ion-icon>
                            Nomor WhatsApp
                        </label>
                        <input type="tel" id="no_wa" name="no_wa" class="form-input @error('no_wa') is-invalid @enderror"
                            placeholder="Contoh: 08123456789" value="{{ old('no_wa') }}" required>
                        <small class="form-help">Nomor WhatsApp untuk verifikasi dan notifikasi</small>
                        @error('no_wa')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <ion-icon name="mail-outline"></ion-icon>
                            Email
                        </label>
                        <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror"
                            placeholder="Masukkan alamat email" value="{{ old('email') }}" required>
                        @error('email')
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
                            <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror"
                                placeholder="Buat password yang kuat" required>
                            <button type="button" class="password-toggle" data-password-toggle
                                aria-label="Toggle password visibility">
                                <ion-icon name="eye-outline"></ion-icon>
                            </button>
                        </div>
                        <small class="form-help">Minimal 6 karakter</small>
                        @error('password')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <ion-icon name="shield-checkmark-outline"></ion-icon>
                            Konfirmasi Password
                        </label>
                        <div class="password-input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-input @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi password Anda" required>
                            <button type="button" class="password-toggle" data-password-toggle
                                aria-label="Toggle password visibility">
                                <ion-icon name="eye-outline"></ion-icon>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="form-group">
                        <label class="checkbox-container">
                            <input type="checkbox" id="agree-terms" name="agree-terms" required>
                            <span class="checkmark"></span>
                            Saya setuju dengan <a href="#" class="terms-link">Syarat & Ketentuan</a> dan <a
                                href="#" class="terms-link">Kebijakan Privasi</a>
                        </label>
                        @error('agree-terms')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="button-custom-shine"
                        style="padding: 8px 18px; background-color: #22c44d; color: #fff; border-radius: 6px; border: 2px solid #222; font-size: 1rem; font-family: inherit; cursor: pointer; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.07); transition: background 0.2s, color 0.2s, box-shadow 0.2s; display: flex; justify-content: center; align-items: center; text-align: center; width: 100%;">
                        Daftar Sekarang
                    </button>

                    <!-- Login Link -->
                    <div class="register-section">
                        <p>Sudah punya akun? <a href="{{ route('login') }}" class="register-link">Masuk sekarang</a>
                        </p>
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
