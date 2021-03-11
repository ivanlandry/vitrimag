<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('annonce/ajouter', [\App\Http\Controllers\AnnonceController::class, 'create'])->name('add_annonce_get');
Route::post('annonce/store', [\App\Http\Controllers\AnnonceController::class, 'store'])->name('add_annonce_post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::view('/', 'back.app')->name('admin');
    });
    Route::resource('categories',\App\Http\Controllers\back\CategorieController::class);
    Route::resource('users',\App\Http\Controllers\back\UserController::class);
});

require __DIR__ . '/auth.php';
