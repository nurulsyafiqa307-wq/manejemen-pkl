<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TempatPklController;
use App\Http\Controllers\Admin\PengajuanPklController;
use App\Http\Controllers\Admin\JurnalPKLController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Siswa\PengajuanPklController as SiswaPengajuanPklController;
use App\Http\Controllers\Siswa\JurnalPKLController as SiswaJurnalPKLController;
use App\Http\Controllers\Siswa\PenilaianController as SiswaPenilaianController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\JurnalPKLController as GuruJurnalPKLController;
use App\Http\Controllers\Guru\PenilaianController as GuruPenilaianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect('/login');
    }

    if ($user->role_id === 1) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role_id === 2) {
        return redirect()->route('guru.dashboard');
    }

    if ($user->role_id === 3) {
        return redirect()->route('siswa.dashboard');
    }

    Auth::logout();

    return redirect('/login')
        ->withErrors([
            'email' => 'Role akun tidak valid.',
        ]);
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Data Siswa
    Route::resource('/siswa', SiswaController::class);

     // CRUD Data Guru
    Route::resource('/guru', GuruController::class);

    // CRUD Tempat PKL
Route::resource('/tempat', TempatPklController::class);

        // Pengajuan PKL
        Route::resource('/pengajuan', PengajuanPklController::class);
        Route::resource('/jurnal', JurnalPKLController::class);



    Route::resource('/penilaian', PenilaianController::class);
    Route::get('/laporan',[LaporanController::class,'index'])
        ->name('laporan.index');
    Route::get('/laporan/pdf',[LaporanController::class,'pdf'])
        ->name('laporan.pdf');
});




/* 
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {

    // Dashboard Guru
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])
        ->name('dashboard');

    // Jurnal PKL Guru
    Route::get('/jurnal', [GuruJurnalPKLController::class, 'index'])
        ->name('jurnal.index');

    Route::get('/jurnal/{id}', [GuruJurnalPKLController::class, 'show'])
        ->name('jurnal.show');

    Route::put('/jurnal/{id}', [GuruJurnalPKLController::class, 'update'])
        ->name('jurnal.update');


    // =========================
    // PENILAIAN GURU
    // =========================

    Route::get('/penilaian', [GuruPenilaianController::class, 'index'])
        ->name('penilaian.index');

    Route::get('/penilaian/create/{siswa}', [GuruPenilaianController::class, 'create'])
        ->name('penilaian.create');

    Route::post('/penilaian', [GuruPenilaianController::class, 'store'])
        ->name('penilaian.store');

    Route::get('/penilaian/{id}', [GuruPenilaianController::class, 'show'])
        ->name('penilaian.show');

    Route::get('/penilaian/{id}/edit', [GuruPenilaianController::class, 'edit'])
        ->name('penilaian.edit');

    Route::put('/penilaian/{id}', [GuruPenilaianController::class, 'update'])
        ->name('penilaian.update');
    Route::delete('/penilaian/{id}', [GuruPenilaianController::class, 'destroy'])
        ->name('penilaian.destroy');


});


/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {

    Route::get('/dashboard', function () {

        $user = Auth::user();
        $siswa = $user->siswa;

        // Cek apakah jurnal hari ini sudah diisi
        $jurnalHariIni = $siswa
            ? $siswa->jurnalPkls()
                ->whereDate('tanggal', now()->toDateString())
                ->exists()
            : false;

        // Ambil penilaian terbaru siswa
        $penilaian = $siswa
            ? \App\Models\Penilaian::where('siswa_id', $siswa->id)
                ->latest()
                ->first()
            : null;

        return view('siswa.dashboard', [
            'user' => $user,
            'siswa' => $siswa,
            'jurnalHariIni' => $jurnalHariIni,
            'penilaian' => $penilaian,
        ]);

    })->name('dashboard');


    // Pengajuan PKL Siswa
    Route::get('/pengajuan', [SiswaPengajuanPklController::class, 'index'])
        ->name('pengajuan.index');

    Route::get('/pengajuan/create', [SiswaPengajuanPklController::class, 'create'])
        ->name('pengajuan.create');

    Route::post('/pengajuan', [SiswaPengajuanPklController::class, 'store'])
        ->name('pengajuan.store');

        // Jurnal Harian Siswa
    Route::get('/jurnal', [SiswaJurnalPKLController::class, 'index'])
        ->name('jurnal.index');

    Route::get('/jurnal/create', [SiswaJurnalPKLController::class, 'create'])
        ->name('jurnal.create');

    Route::post('/jurnal', [SiswaJurnalPKLController::class, 'store'])
        ->name('jurnal.store');

    Route::get('/jurnal/{id}/edit', [SiswaJurnalPKLController::class, 'edit'])
        ->name('jurnal.edit');

    Route::put('/jurnal/{id}', [SiswaJurnalPKLController::class, 'update'])
        ->name('jurnal.update');
    Route::get('/penilaian', [SiswaPenilaianController::class, 'index'])
        ->name('penilaian.index');

 
});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| PROFILE SISWA
|--------------------------------------------------------------------------
*/




/*
|--------------------------------------------------------------------------
| PROFILE GURU
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:guru'])->group(function () {

    Route::get('/guru/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit-guru');

    Route::patch('/guru/profile', [ProfileController::class, 'update'])
        ->name('profile.update-guru');

    Route::delete('/guru/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy-guru');

});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// TEST sementara untuk melihat dashboard siswa tanpa login
Route::get('/test-siswa', function () {
    return view('siswa.dashboard');
});

require __DIR__ . '/auth.php';