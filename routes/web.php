<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    DashboardController,
};

use App\Http\Controllers\admin\{
    ArtikelController,
    KategoriGambarController,
    KategoriProdukController,
    LayananController,
    ProdukController,
    ProfilController,
    TentangController,
    TestimoniController,
    TimController,
    DashboardSuperAdminController,
    GaleriController,
    KategoriArtikelController,
    KomentarArtikelController,
    KontakController,
    BerandaController,
    ProfilAdminController,
};
// use App\Http\Controllers\user\{

// };
use App\Http\Controllers\auth\{
    LoginController,
    RegisterController,
    GoogleController,
    ForgotPasswordController,
};
use App\Http\Controllers\web\{
    LandingController,
    AboutController,
    ServiceController,
    GalleryController,
    ContactController,
    ProfilWebController,
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/run-superadmin', function () {
    Artisan::call('db:seed', [
        '--class' => 'SuperAdminSeeder'
    ]);

    return "SuperAdminSeeder has been create successfully!";
});
// Manual
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/auth/google/complete', [GoogleController::class, 'showCompleteForm'])->name('google.complete');
Route::post('/auth/google/complete-register', [GoogleController::class, 'completeRegister'])->name('google.complete.register');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showRequestOtpForm'])->name('forgot-password');
Route::get('/forgot-password/verify', [ForgotPasswordController::class, 'showVerifyOtpForm'])->name('forgot-password.verify');
Route::get('/forgot-password/reset', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('forgot-password.reset');

Route::post('/forgot-password/request-otp', [ForgotPasswordController::class, 'requestOtp'])->name('forgot-password.request-otp');
Route::post('/forgot-password/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('forgot-password.verify-otp');
Route::post('/forgot-password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('forgot-password.reset-password');


Route::group(['middleware' => ['role:superadmin']], function () {
    Route::get('/profil-admin', [ProfilAdminController::class, 'index'])->name('profil-admin');
    Route::put('/profil-admin/update', [ProfilAdminController::class, 'update'])->name('profil-admin.update');
    Route::get('/dashboard-superadmin', [DashboardSuperAdminController::class, 'index'])->name('dashboard-superadmin');
    Route::resource('beranda', BerandaController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('tentang', TentangController::class);
    Route::resource('testimoni', TestimoniController::class);
    Route::resource('tim', TimController::class);
    Route::resource('kategoriArtikel', KategoriArtikelController::class);
    Route::resource('komentarArtikel', KomentarArtikelController::class);
    Route::resource('kategoriProduk', KategoriProdukController::class);
    Route::resource('kategoriGambar', KategoriGambarController::class);
});


// Route untuk user
Route::group(['middleware' => ['auth']], function () {
  
});

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services-detail', [ServiceController::class, 'detail'])->name('services-detail');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery-detail', [GalleryController::class, 'detail'])->name('gallery-detail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/profil-user', [ProfilWebController::class, 'index'])->name('profil-user');
Route::put('/profil-user/update', [ProfilWebController::class, 'update'])->name('profil-user.update');