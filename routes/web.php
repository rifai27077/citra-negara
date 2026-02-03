<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\AuthController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
})->name('landing');

/*
|--------------------------------------------------------------------------
| Chatbot
|--------------------------------------------------------------------------
*/
Route::get('/chat', function () {
    return view('chatbot');
});
Route::post('/chatbot', [ChatbotController::class, 'chat']);
Route::post('/chatbot/reset', [ChatbotController::class, 'resetChat']);

/*
|--------------------------------------------------------------------------
| Akademik & PPDB Umum
|--------------------------------------------------------------------------
*/
Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');

Route::get('/spmb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('ppdb.store');

/*
|--------------------------------------------------------------------------
| Berita
|--------------------------------------------------------------------------
*/
Route::prefix('berita')->group(function () {
    Route::get('/', fn() => view('berita'))->name('berita');
    Route::get('/grand-opening', fn() => view('berita.grand-opening'))->name('berita.grand-opening');
    Route::get('/ppdb-smksma', fn() => view('berita.ppdb-smksma'))->name('berita.ppdb-smksma');
    Route::get('/seminar', fn() => view('berita.seminar'))->name('berita.seminar');
});

/*
|--------------------------------------------------------------------------
| Halaman Umum
|--------------------------------------------------------------------------
*/
Route::get('/kontak', fn() => view('kontak-info'))->name('kontak');
Route::get('/daftar-harga', fn() => view('daftar-harga'))->name('daftar-harga');

/*
|--------------------------------------------------------------------------
| SMK
|--------------------------------------------------------------------------
*/
Route::prefix('smk')->group(function () {
    Route::get('/', fn() => view('smk.landing'))->name('smk.index');

    Route::get('/jurusan/{nama}', fn($nama) => view('smk.jurusan.' . strtolower($nama)))->name('smk.jurusan');
    Route::get('/sejarah', fn() => view('smk.sejarah'))->name('smk.sejarah');
    Route::get('/yayasan', fn() => view('smk.yayasan'))->name('smk.yayasan');
    Route::get('/sekolah', fn() => view('smk.sekolah'))->name('smk.sekolah');
    Route::get('/prestasi', fn() => view('smk.prestasi'))->name('smk.prestasi');
    Route::get('/ekstrakurikuler', fn() => view('smk.ekstrakurikuler'))->name('smk.ekstrakurikuler');
    Route::get('/spmb', fn() => view('smk.spmb'))->name('smk.spmb');

    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('smk.ppdb.store');
    Route::get('/daftar-harga', fn() => view('smk.daftar-harga'))->name('smk.daftar-harga');
});

/*
|--------------------------------------------------------------------------
| SMP
|--------------------------------------------------------------------------
*/
Route::prefix('smp')->group(function () {
    Route::get('/', fn() => view('smp.landing'))->name('smp.index');
    Route::get('/spmb', fn() => view('smp.spmb'))->name('smp.spmb');

    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('smp.ppdb.store');
    Route::get('/daftar-harga', fn() => view('smp.daftar-harga'))->name('smp.daftar-harga');
});

/*
|--------------------------------------------------------------------------
| SMA
|--------------------------------------------------------------------------
*/
Route::prefix('sma')->group(function () {
    Route::get('/', fn() => view('sma.landing'))->name('sma.index');
    Route::get('/jurusan/{nama}', fn($nama) => view('sma.jurusan.' . strtolower($nama)))->name('sma.jurusan');
    Route::get('/spmb', fn() => view('sma.spmb'))->name('sma.spmb');

    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('sma.ppdb.store');
    Route::get('/daftar-harga', fn() => view('sma.daftar-harga'))->name('sma.daftar-harga');
});

/*
|--------------------------------------------------------------------------
| Admin Panel (Custom)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // PPDB Management
        Route::prefix('ppdb')->name('ppdb.')->group(function () {
            Route::get('/', [AdminPpdbController::class, 'index'])->name('index');
            Route::get('/{ppdb}', [AdminPpdbController::class, 'show'])->name('show');
            Route::get('/{ppdb}/edit', [AdminPpdbController::class, 'edit'])->name('edit');
            Route::post('/{ppdb}', [AdminPpdbController::class, 'update'])->name('update');
            Route::delete('/{ppdb}', [AdminPpdbController::class, 'destroy'])->name('destroy');
            Route::post('/{ppdb}/status', [AdminPpdbController::class, 'updateStatus'])->name('update-status');
            Route::post('/bulk-update', [AdminPpdbController::class, 'bulkUpdate'])->name('bulk-update');
            Route::get('/export', [AdminPpdbController::class, 'export'])->name('export');
        });

        // Berita Management
        Route::resource('berita', BeritaController::class);

        // FAQ Management
        Route::resource('faq', FaqController::class);

        // User Management
        Route::resource('users', UserController::class);
    });
});
