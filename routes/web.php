<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaftarHargaController;
use App\Http\Controllers\EkstrakurikulerController;


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
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
});

/*
|--------------------------------------------------------------------------
| Halaman Umum
|--------------------------------------------------------------------------
*/
Route::get('/kontak', fn() => view('kontak-info'))->name('kontak');
Route::get('/daftar-harga', [\App\Http\Controllers\DaftarHargaController::class, 'index'])->name('daftar-harga');

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
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'getByCategory'])->defaults('category', 'smk')->name('smk.ekstrakurikuler');
    Route::get('/ekstrakurikuler/{slug}', [EkstrakurikulerController::class, 'show'])->defaults('category', 'smk')->name('smk.ekstrakurikuler.show');
    Route::get('/spmb', fn() => view('smk.spmb'))->name('smk.spmb');

    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('smk.ppdb.store');
    Route::get('/daftar-harga', [DaftarHargaController::class, 'showCategory'])->defaults('category', 'smk')->name('smk.daftar-harga');
});

/*
|--------------------------------------------------------------------------
| SMP
|--------------------------------------------------------------------------
*/
Route::prefix('smp')->group(function () {
    Route::get('/', fn() => view('smp.landing'))->name('smp.index');
    Route::get('/spmb', fn() => view('smp.spmb'))->name('smp.spmb');
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'getByCategory'])->defaults('category', 'smp')->name('smp.ekstrakurikuler');
    Route::get('/ekstrakurikuler/{slug}', [EkstrakurikulerController::class, 'show'])->defaults('category', 'smp')->name('smp.ekstrakurikuler.show');

    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('smp.ppdb.store');
    Route::get('/daftar-harga', [DaftarHargaController::class, 'showCategory'])->defaults('category', 'smp')->name('smp.daftar-harga');
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
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'getByCategory'])->defaults('category', 'sma')->name('sma.ekstrakurikuler');
    Route::get('/ekstrakurikuler/{slug}', [EkstrakurikulerController::class, 'show'])->defaults('category', 'sma')->name('sma.ekstrakurikuler.show');

    Route::post('/ppdb/store', [PpdbController::class, 'store'])->name('sma.ppdb.store');
    Route::get('/daftar-harga', [DaftarHargaController::class, 'showCategory'])->defaults('category', 'sma')->name('sma.daftar-harga');
});

/*
|--------------------------------------------------------------------------
| Deployment Helpers (Khusus cPanel)
|--------------------------------------------------------------------------
*/
Route::get('/cpanel/link-storage', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return 'Symlink storage berhasil dibuat via Artisan!';
    } catch (\Exception $e) {
        return 'Gagal membuat symlink otomatis, error: ' . $e->getMessage();
    }
});

Route::get('/cpanel/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Semua cache Laravel berhasil dihapus!';
});
