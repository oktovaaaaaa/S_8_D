<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserJadwalController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserTentangController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserGaleriController;
use App\Http\Controllers\TestimoniController;



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

    /* TESTIMONI*/

        Route::prefix('userr')->group(function () {
            Route::get('/testimoni', [TestimoniController::class, 'index'])->name('userr.testimoni.index');

            // Rute untuk CRUD testimoni (sekarang dalam satu controller)
            Route::prefix('testimoni')->group(function () {
                Route::get('/create', [TestimoniController::class, 'create'])->name('userr.testimoni.create');
                Route::post('/store', [TestimoniController::class, 'store'])->name('userr.testimoni.store');
                Route::get('/{testimoni}/edit', [TestimoniController::class, 'edit'])->name('userr.testimoni.edit');
                Route::put('/{testimoni}', [TestimoniController::class, 'update'])->name('userr.testimoni.update');
                Route::delete('/{testimoni}', [TestimoniController::class, 'destroy'])->name('userr.testimoni.destroy');
            });
        });






Route::get('/dashboard', [MenuController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/userr/menu', [UserMenuController::class, 'index'])->name('userr.menu');
Route::get('userr/jadwal', [UserJadwalController::class, 'index'])->name('userr.jadwal');
Route::get('userr/tentang', [UserTentangController::class, 'index'])->name('userr.tentang');
Route::get('userr/galeri', [UserGaleriController::class, 'index'])->name('userr.galeri');


Route::get('/userr.jadwal', function () {
    return view('userr.jadwal');
});


Route::middleware( 'admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //UNTUK Admin menu
Route::get('menus', [MenuController::class, 'index'])->name('menus.tampilan');
Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
Route::post('menus', [MenuController::class, 'store'])->name('menus.store');
Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
Route::delete('menu/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');



// UNTUK ADMIN JADWAL
Route::get('jadwals', [JadwalController::class, 'index'])->name('jadwals.tampilan');
Route::get('jadwals/create', [JadwalController::class, 'create'])->name('jadwals.create');
Route::post('jadwals', [JadwalController::class, 'store'])->name('jadwals.store');
Route::get('jadwals/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
Route::put('jadwals/{jadwal}', [JadwalController::class, 'update'])->name('jadwals.update');
Route::delete('jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');

// UNTUK ADMIN tentang
Route::get('tentangs', [TentangController::class, 'index'])->name('tentangs.tampilan');
Route::get('tentangs/create', [TentangController::class, 'create'])->name('tentangs.create');
Route::post('tentangs', [TentangController::class, 'store'])->name('tentangs.store');
Route::get('tentangs/{tentang}/edit', [TentangController::class, 'edit'])->name('tentangs.edit');
Route::put('tentangs/{tentang}', [TentangController::class, 'update'])->name('tentangs.update');
Route::delete('tentang/{tentang}', [TentangController::class, 'destroy'])->name('tentangs.destroy');

// UNTUK ADMIN galeri
Route::get('galeris', [GaleriController::class, 'index'])->name('galeris.tampilan');
Route::get('galeris/create', [GaleriController::class, 'create'])->name('galeris.create');
Route::post('galeris', [GaleriController::class, 'store'])->name('galeris.store');
Route::get('galeris/{galeri}/edit', [GaleriController::class, 'edit'])->name('galeris.edit');
Route::put('galeris/{galeri}', [GaleriController::class, 'update'])->name('galeris.update');
Route::delete('galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeris.destroy');






    Route::post('/logout',[AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
});

require __DIR__.'/auth.php';
