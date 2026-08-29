<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\CederaController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RiwayatDiagnosaController;
use App\Http\Controllers\NotifikasiController;
use Illuminate\Support\Facades\Auth;


//alternatif
Route::get('/force-logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login')->with('status', 'Logout paksa berhasil.');
});


//supepowah
Route::get('/', [DiagnosaController::class, 'publicIndex'])->name('home');



//login mabar
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');


//atmint
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    
    Route::prefix('user')->name('admin.user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('gejala')->name('admin.gejala.')->group(function () {
        Route::get('/', [GejalaController::class, 'index'])->name('index');     
        Route::get('/create', [GejalaController::class, 'create'])->name('create'); 
        Route::post('/', [GejalaController::class, 'store'])->name('store');       
        Route::get('/{id}/edit', [GejalaController::class, 'edit'])->name('edit'); 
        Route::put('/{id}', [GejalaController::class, 'update'])->name('update');  
        Route::delete('/{id}', [GejalaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('cedera')->name('admin.cedera.')->group(function () {
        Route::get('/', [CederaController::class, 'index'])->name('index');
        Route::get('/create', [CederaController::class, 'create'])->name('create');
        Route::post('/', [CederaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CederaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CederaController::class, 'update'])->name('update');
        Route::delete('/{id}', [CederaController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('basis_pengetahuan')->name('admin.basis_pengetahuan.')->group(function () {
        Route::get('/', [BasisPengetahuanController::class, 'index'])->name('index');       
        Route::get('/create', [BasisPengetahuanController::class, 'create'])->name('create');
        Route::get('/{id}/kelola', [BasisPengetahuanController::class, 'kelola'])->name('kelola');
        Route::post('/{id}/kelola', [BasisPengetahuanController::class, 'updateKelola'])->name('updateKelola');
        Route::post('/', [BasisPengetahuanController::class, 'store'])->name('store');  
        Route::get('/{kode_rule}/edit', [BasisPengetahuanController::class, 'edit'])->name('edit'); 
        Route::put('/{kode_rule}', [BasisPengetahuanController::class, 'update'])->name('update');  
        Route::delete('/{kode_rule}', [BasisPengetahuanController::class, 'destroy'])->name('destroy'); 
    });

    route::prefix('notifikasi')->name('admin.notifikasi.')->group(function() {
        route::get('/', [NotifikasiController::class, 'index'])->name('index');
        route::post('/dibaca/{id}', [NotifikasiController::class, 'tandaiDibaca'])->name('dibaca');
    });

        Route::resource('riwayat_diagnosa', RiwayatDiagnosaController::class)
            ->only(['index', 'show', 'destroy'])
            ->names([
                'index' => 'admin.riwayat_diagnosa.index',
                'show' => 'admin.riwayat_diagnosa.show',
                'destroy' => 'admin.riwayat_diagnosa.destroy',
            ]);
    
    
});

//pakarnihbosa
Route::middleware(['auth', 'role:pakar'])->prefix('pakar')->group(function () {
    
    Route::prefix('gejala')->name('pakar.gejala.')->group(function () {
        Route::get('/', [GejalaController::class, 'index'])->name('index');     
        Route::get('/create', [GejalaController::class, 'create'])->name('create'); 
        Route::post('/', [GejalaController::class, 'store'])->name('store');       
        Route::get('/{id}/edit', [GejalaController::class, 'edit'])->name('edit'); 
        Route::put('/{id}', [GejalaController::class, 'update'])->name('update');  
        Route::delete('/{id}', [GejalaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('cedera')->name('pakar.cedera.')->group(function () {
        Route::get('/', [CederaController::class, 'index'])->name('index');
        Route::get('/create', [CederaController::class, 'create'])->name('create');
        Route::post('/', [CederaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CederaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CederaController::class, 'update'])->name('update');
        Route::delete('/{id}', [CederaController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('basis_pengetahuan')->name('pakar.basis_pengetahuan.')->group(function () {
        Route::get('/', [BasisPengetahuanController::class, 'index'])->name('index');       
        Route::get('/create', [BasisPengetahuanController::class, 'create'])->name('create');
        Route::get('/{id}/kelola', [BasisPengetahuanController::class, 'kelola'])->name('kelola');
        Route::post('/{id}/kelola', [BasisPengetahuanController::class, 'updateKelola'])->name('updateKelola');
        Route::post('/', [BasisPengetahuanController::class, 'store'])->name('store');  
        Route::get('/{kode_rule}/edit', [BasisPengetahuanController::class, 'edit'])->name('edit'); 
        Route::put('/{kode_rule}', [BasisPengetahuanController::class, 'update'])->name('update');  
        Route::delete('/{kode_rule}', [BasisPengetahuanController::class, 'destroy'])->name('destroy'); 
    });
});


//member
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('pasien.diagnosa_index');
    Route::post('/diagnosa/simpan', [DiagnosaController::class, 'simpanRiwayat'])->name('pasien.diagnosa.simpan');

    Route::prefix('riwayat_diagnosa')->name('pasien.riwayat_diagnosa.')->group(function () {
        Route::get('/', [RiwayatDiagnosaController::class, 'index'])->name('index');
        Route::get('/{id}', [RiwayatDiagnosaController::class, 'show'])->name('show');
        Route::delete('/{id}', [RiwayatDiagnosaController::class, 'destroy'])->name('destroy');
    });

});




