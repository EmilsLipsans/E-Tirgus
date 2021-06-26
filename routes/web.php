<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[MainController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/{id}/show',[MainController::class, 'show'])->middleware(['auth'])->name('dashboardShow');


Route::get('/favourites/{id}/create',[MainController::class, 'create'])->middleware(['auth'])->name('dashboardShow');
Route::get('/favourites',[FavouriteController::class, 'index'])->middleware(['auth'])->name('favourites');
Route::get('/favourites/{id}/show',[FavouriteController::class, 'show'])->middleware(['auth'])->name('favouritesShow');

//Route::get('/favourites', function () {
//    return view('favourites');
//})->middleware(['auth'])->name('favourites');

Route::get('/myAdverts', function () {
    return view('myAdverts');
})->middleware(['auth'])->name('myAdverts');





require __DIR__.'/auth.php';

Route::resource('/myAdverts/show', AdvertController::class);
//Route::resource('/dashboard/show', MainController::class);



//Route::resource('/dashboard', ShowController::class);      
//Route::resource('/Dashboard', AdvertController::class);

