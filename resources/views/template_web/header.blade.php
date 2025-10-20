<header class="header __js_fixed-header">
    <div class="header__container container container--size-large">
        @php
            $profil = \App\Models\Profil::first();
        @endphp
        <a class="header__logo logo">
            @if($profil && $profil->logo_perusahaan)
                <img src="{{ asset('upload/profil/' . $profil->logo_perusahaan) }}" alt="Logo" width="76" height="19">
            @else
                <img src="{{ asset('env/logo.png') }}" alt="Logo" width="76" height="19">
            @endif
        </a>
        <div class="header__mobile mobile-canvas">
            <nav class="mobile-canvas__nav navigation">
                <ul class="navigation__list">
                    <li class="navigation__item">
                        <a class="navigation__link animsition-link" href="/">Home<span
                                class="navigation__link-icon">
                                <svg width="12" height="13">
                                    <use xlink:href="#link-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link animsition-link" href="/about">About<span
                                class="navigation__link-icon">
                                <svg width="12" height="13">
                                    <use xlink:href="#link-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link animsition-link" href="/services">Services<span
                                class="navigation__link-icon">
                                <svg width="12" height="13">
                                    <use xlink:href="#link-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link animsition-link" href="/gallery">Gallery<span
                                class="navigation__link-icon">
                                <svg width="12" height="13">
                                    <use xlink:href="#link-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link animsition-link" href="/contact">Contact<span
                                class="navigation__link-icon">
                                <svg width="12" height="13">
                                    <use xlink:href="#link-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Social-->
            @php
                use Illuminate\Support\Str;
            @endphp
            <ul class="header__social social--white social">
                @guest
                    <li class="navigation__item" style="margin-bottom: 8px;">
                        <a class="navigation__link animsition-link" href="{{ route('login') }}">
                            Login
                            <span class="navigation__link-icon">
                                <i class='bx bx-log-in'></i>
                            </span>
                        </a>
                    </li>
                    <li class="navigation__item" style="margin-bottom: 8px;">
                        <a class="navigation__link animsition-link" href="{{ route('register') }}">
                            Register
                            <span class="navigation__link-icon">
                                <i class='bx bx-user-plus'></i>
                            </span>
                        </a>
                    </li>
                @else
                    <li class="navigation__item" style="margin-bottom: 8px;">
                        @php
                            $user = auth()->user();
                            $fotoProfile = $user->foto_profile ?? null;
                            if ($fotoProfile) {
                                if (Str::startsWith($fotoProfile, ['http://', 'https://'])) {
                                    $srcFoto = $fotoProfile;
                                } else {
                                    $srcFoto = asset('uploads/foto_profile/' . $fotoProfile);
                                }
                            } else {
                                $srcFoto = asset('env/logo.jpg');
                            }
                        @endphp
                        <a class="navigation__link animsition-link" href="{{ route('profil-user') }}" style="display: flex; align-items: center;">
                            <img src="{{ $srcFoto }}" alt="Foto Profil" style="width:32px; height:32px; border-radius:50%; object-fit:cover; margin-right:8px;">
                            <span style="vertical-align: middle;">{{ $user->name }}</span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <button class="header__menu-toggle menu-toggle" type="button">
            <span class="menu-toggle__line"></span>
            <span class="visually-hidden">Menu toggle</span>
        </button>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('main-header');
    const currentPath = window.location.pathname;
    
    // Daftar URL yang memerlukan teks header berwarna putih
    const whiteTextUrls = [
        '/',
        '/about',
    ];
    
    // Cek apakah URL saat ini memerlukan teks putih
    if (whiteTextUrls.includes(currentPath)) {
        header.classList.add('header--white-text');
    }
});
</script>