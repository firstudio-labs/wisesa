<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    DashboardController,
    LoginController,
};

use App\Http\Controllers\asisten\{
    DashboardAsistenController,
    MandorController,
    ElemenController,
};
use App\Http\Controllers\user\{
    PreviewController,
    LinkController,
    EditorController,
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

Route::get('/run-asisten', function () {
    Artisan::call('db:seed', [
        '--class' => 'AsistenSeeder'
    ]);

    return "AsistenSeeder has been create successfully!";
});
Route::get('/', [LoginController::class, 'showLoginForm'])->name('formlogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['role:asisten']], function () {
    Route::get('/dashboard-asisten', [DashboardAsistenController::class, 'index'])->name('dashboard-asisten');
    Route::resource('dataelemen', ElemenController::class);
});

    Route::get('/preview', [PreviewController::class, 'index'])->name('preview');

// Route untuk user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/editor', [EditorController::class, 'index'])->name('editor');
    Route::post('/store-link', [LinkController::class, 'store'])->name('store-link');
    Route::post('/store-layout', [LinkController::class, 'storeLayout'])->name('store-layout');
    Route::get('/get-layout', [LinkController::class, 'getLayout'])->name('get-layout');
    Route::post('/update-profile', [LinkController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update-grid-produk', [LinkController::class, 'updateGridProduk'])->name('update-grid-produk');
    Route::post('/update-tombol-link', [LinkController::class, 'updateTombolLink'])->name('update-tombol-link');
    Route::post('/update-youtube-embed', [LinkController::class, 'updateYoutubeEmbed'])->name('update-youtube-embed');
    Route::post('/update-sosial-media', [LinkController::class, 'updateSosialMedia'])->name('update-sosial-media');
    Route::post('/update-portfolio-project', [LinkController::class, 'updatePortfolioProject'])->name('update-portfolio-project');
    Route::post('/update-gambar-thumbnail', [LinkController::class, 'updateGambarThumbnail'])->name('update-gambar-thumbnail');
    Route::post('/update-spotify-embed', [LinkController::class, 'updateSpotifyEmbed'])->name('update-spotify-embed');
    Route::post('/update-background-custom', [LinkController::class, 'updateBackgroundCustom'])->name('update-background-custom');
    Route::get('/test-profile', [LinkController::class, 'testProfile'])->name('test-profile');
});
