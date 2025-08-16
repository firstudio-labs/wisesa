<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    DashboardController,
};

use App\Http\Controllers\superadmin\{
    DashboardSuperAdminController,
};
use App\Http\Controllers\user\{
    PreviewController,
    LinkController,
    EditorController,
};
use App\Http\Controllers\auth\{
    LoginController,
    RegisterController,
    GoogleController,
    ForgotPasswordController,
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
    Route::get('/dashboard-superadmin', [DashboardSuperAdminController::class, 'index'])->name('dashboard-superadmin');
});

Route::get('/preview', [PreviewController::class, 'index'])->name('preview');

// Route untuk user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/editor', [EditorController::class, 'index'])->name('editor');
    Route::get('/get-layout', [LinkController::class, 'getLayout'])->name('get-layout');
    Route::get('/test-profile', [LinkController::class, 'testProfile'])->name('test-profile');
    Route::post('/store-link', [LinkController::class, 'store'])->name('store-link');
    Route::post('/store-layout', [LinkController::class, 'storeLayout'])->name('store-layout');
    Route::post('/update-profile', [LinkController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update-grid-produk', [LinkController::class, 'updateGridProduk'])->name('update-grid-produk');
    Route::post('/update-tombol-link', [LinkController::class, 'updateTombolLink'])->name('update-tombol-link');
    Route::post('/update-youtube-embed', [LinkController::class, 'updateYoutubeEmbed'])->name('update-youtube-embed');
    Route::post('/update-sosial-media', [LinkController::class, 'updateSosialMedia'])->name('update-sosial-media');
    Route::post('/update-portfolio-project', [LinkController::class, 'updatePortfolioProject'])->name('update-portfolio-project');
    Route::post('/update-gambar-thumbnail', [LinkController::class, 'updateGambarThumbnail'])->name('update-gambar-thumbnail');
    Route::post('/update-spotify-embed', [LinkController::class, 'updateSpotifyEmbed'])->name('update-spotify-embed');
    Route::post('/update-background-custom', [LinkController::class, 'updateBackgroundCustom'])->name('update-background-custom');
});
