<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
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

Route::get('/',[MainController::class, 'index'])->name('dashboard');

Route::get('/myAdverts', function () {
    return view('myAdverts');
})->middleware(['auth'])->name('myAdverts');
Route::resource('/myAdverts/show', AdvertController::class);
Route::get('/myAdverts/{id}/show',[AdvertController::class, 'show'])->middleware(['auth'])->name('dashboardShow');

Route::get('/dashboard',[MainController::class, 'index'])->name('dashboard');
Route::get('/dashboard/{id}/show',[MainController::class, 'show'])->name('dashboardShow');
Route::delete('/delete/{id}',[MainController::class, 'destroy'])->middleware(['auth'])->name('favouritesStore');

Route::delete('/dashboard/{id}',[FavouriteController::class, 'destroy'])->middleware(['auth'])->name('favouritesStore');

Route::get('/favourites',[FavouriteController::class, 'index'])->middleware(['auth'])->name('favourites');
Route::get('/favourites/{id}/show',[FavouriteController::class, 'show'])->middleware(['auth'])->name('favouritesShow');
Route::post('/favourites/store',[FavouriteController::class, 'store'])->middleware(['auth'])->name('favouritesStore');
Route::delete('/favourites/{id}',[FavouriteController::class, 'destroy2'])->middleware(['auth'])->name('favouritesStore');

Route::get('/users',[UserController::class, 'index'])->middleware(['auth'])->name('users');
Route::post('/users/{id}',[UserController::class, 'update'])->middleware(['auth'])->name('favouritesStore');
require __DIR__.'/auth.php';

Route::get('lang/{locale}',LanguageController::class);

Route::get('/profile',[ProfileController::class, 'index'])->middleware(['auth'])->name('profile');
//Route::resource('/dashboard/show', MainController::class);

