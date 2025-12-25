<?php

use App\Models\Post;
use App\Models\User;
use App\Models\PpdbJadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TesMasukController;
use App\Http\Controllers\AdminPpdbController;
use App\Http\Controllers\AdminSoalController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\PpdbJadwalController;
use App\Http\Controllers\UploadBerkasController;
use App\Http\Controllers\AdminTesMasukController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'));

// About
Route::get('/about', [AboutController::class, 'show']);

// Posts
Route::get('/posts', fn() => view('posts', ['posts' => Post::all()]));
Route::get('/posts/{post:slug}', fn(Post $post) => view('posts', ['title' => 'Single Post', 'post' => $post]));

// Authors
Route::get('/authors/{user}', fn(User $user) => view('posts', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]));

// News
// Route::get('/news', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


// Contact & PPDB
Route::get('/contact', fn() => view('contact'));
Route::get('/ppdb', function () {
    $jadwal = PpdbJadwal::first();
    return view('ppdb', compact('jadwal'));
});

// Authentication
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', fn() => view('register'));
Route::post('/register', [AuthController::class, 'register'])->name('register.store');


// Formulir Siswa & Orang Tua
Route::get('/formulir', fn() => view('formulir.siswa'));
Route::post('/formulir-siswa', [CalonSiswaController::class, 'store'])->name('formulir.siswa.store');

Route::get('/formulir-ortu', fn() => view('formulir-ortu'));
Route::get('/formulir-ortu/{calonSiswa}', [OrtuController::class, 'create'])->name('formulir.ortu');
Route::post('/formulir-ortu/{calonSiswa}', [OrtuController::class, 'store'])->name('formulir.ortu.store');

// Upload Berkas
Route::get('/upload/{calonSiswa}', [UploadBerkasController::class, 'create'])->name('upload.form');
Route::post('/upload/{calonSiswa}', [UploadBerkasController::class, 'store'])->name('upload.store');

// User Dashboard
// Route::get('/user/{calonSiswa}', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {

    // Dashboard
    Route::get('/', [UserController::class, 'dashboard'])->name('user.dashboard');
});
/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // Admin About
    Route::get('/about', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('/about', [AboutController::class, 'update'])->name('admin.about.update');

    // Admin News
    Route::get('/news', [PostController::class, 'admin'])->name('admin.news.index');
    Route::post('/news', [PostController::class, 'store'])->name('admin.news.store');

    // Admin Contact
    Route::get('/contact', fn() => view('admin.contact'))->name('admin.contact');

    // Admin PPDB
    Route::get('/ppdb', [AdminPpdbController::class, 'index'])->name('admin.ppdb.index');
    Route::get('/ppdb/{id}/download/{file}', [AdminPpdbController::class, 'download'])->name('admin.ppdb.download');
    Route::get('/ppdb', [AdminPpdbController::class, 'index'])
        ->name('admin.ppdb.index');

    Route::get('/ppdb-jadwal', [PpdbJadwalController::class, 'edit'])
        ->name('admin.ppdb.jadwal.edit');

    Route::post('/ppdb-jadwal', [PpdbJadwalController::class, 'update'])
        ->name('admin.ppdb.jadwal.update');

    Route::get(
        '/admin/ppdb/download-all',
        [AdminPpdbController::class, 'downloadAll']
    )->name('admin.ppdb.downloadAll');


    // Admin Tes Masuk
    Route::get('/tes-masuk', [AdminTesMasukController::class, 'index'])->name('admin.tes-masuk.index');

    // Admin Kontrol
    Route::post('/tes-masuk/control', [AdminTesMasukController::class, 'control'])->name('admin.tes.control');

    // Admin Soal
    Route::post('/soal', [AdminSoalController::class, 'store'])->name('admin.soal.store');
    Route::delete('/soal/{id}', [AdminSoalController::class, 'destroy'])->name('admin.soal.destroy');
});

/*
|--------------------------------------------------------------------------
| Tes Masuk
|--------------------------------------------------------------------------
*/
Route::get('/test', [TesMasukController::class, 'index'])->middleware('auth')->name('tes.index');
Route::post('/test', [TesMasukController::class, 'submit'])->middleware('auth')->name('tes.submit');

/*
/--------------------------------------------------------------------------
/ log
/--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
