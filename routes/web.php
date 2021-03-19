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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('annonce/ajouter', [\App\Http\Controllers\AnnonceController::class, 'create'])->name('add_annonce_get');
Route::post('annonce/store', [\App\Http\Controllers\AnnonceController::class, 'store'])->name('add_annonce_post');
Route::get('annonce/{id}', [\App\Http\Controllers\AnnonceController::class, 'show'])->name('show_annonce');
Route::delete('annonce/{id}', [\App\Http\Controllers\AnnonceController::class, 'destroy'])->name('delete_annonce');
Route::put('annonce/{id}', [\App\Http\Controllers\AnnonceController::class, 'update'])->name('update_annonce');
Route::get('annonce/', [\App\Http\Controllers\AnnonceController::class, 'index'])->name('all_annonce');

Route::post('getSousCategorie/', [\App\Http\Controllers\AnnonceController::class, 'getSousCategorie'])->name('getSousCategorie');


Route::get('/dashboard', [\App\Http\Controllers\monCompte\MonCompteController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::put('user/update/{id}',[\App\Http\Controllers\monCompte\MonCompteController::class,'updateUser'])->middleware(['auth'])->name('update_user');
Route::post('add_favoris/',[\App\Http\Controllers\monCompte\MonCompteController::class,'addFavoris'])->middleware(['auth'])->name('add_favoris');

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::view('/', 'back.app')->name('admin');
    });
    Route::get('page', [\App\Http\Controllers\back\PageController::class, 'create'])->name('page');
    Route::get('parametres', [\App\Http\Controllers\back\SettingController::class, 'index'])->name('setting');
    Route::resource('categories', \App\Http\Controllers\back\CategorieController::class);
    Route::resource('sous-categories', \App\Http\Controllers\back\SousCategorieController::class);
    Route::get('annonces', [\App\Http\Controllers\back\AnnonceController::class, 'index'])->name('annonce.index');
    Route::put('annonces/{id}', [\App\Http\Controllers\back\AnnonceController::class, 'valider_annonce'])->name('annonce.valider');
    Route::delete('annonces/{id}', [\App\Http\Controllers\back\AnnonceController::class, 'destroy'])->name('annonce.destroy');
    Route::resource('users', \App\Http\Controllers\back\UserController::class);
});


require __DIR__ . '/auth.php';
