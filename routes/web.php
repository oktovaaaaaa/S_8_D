<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserJadwalController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MenuController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/userr/menu', [UserMenuController::class, 'index'])->name('userr.menu');
Route::get('userr/jadwal;', [UserJadwalController::class, 'index'])->name('userr.jadwal');
Route::get('/userr.jadwal', function () {
    return view('userr.jadwal');
});


Route::middleware('auth')->group(function () {
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





    Route::post('/logout',[AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
});

require __DIR__.'/auth.php';
