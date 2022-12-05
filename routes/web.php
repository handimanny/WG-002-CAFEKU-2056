<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PengelolaanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//route menuju index & dasboard
Route::get('/', [HomeController::class, 'index']);
Route::get('/dasboard', [HomeController::class, 'home'])->name('dasboard');

//middleware auth login
Route::middleware(['auth'])->group(function () {
    Route::resource('order', OrderController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('deletekategori/{id}', [KategoriController::class,'destroy'])->name('deletekategori');
    Route::resource('menu', MenuController::class);
    Route::get('deletemenu/{id}', [MenuController::class,'destroy'])->name('deletemenu');
});

//middleware auth login & owner
Route::middleware(['auth','owner'])->group(function () {
    Route::resource('pengelolaan', PengelolaanController::class);
    Route::get('deletepengelolaan/{id}', [PengelolaanController::class,'destroy'])->name('deletepengelolaan');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
