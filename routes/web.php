<?php

use App\Http\Controllers\AdvertController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/myAdverts', function () {
    return view('myAdverts');
})->middleware(['auth'])->name('myAdverts');

Route::get('/favourites', function () {
    return view('favourites');
})->middleware(['auth'])->name('favourites');



require __DIR__.'/auth.php';

Route::resource('/myAdverts/show', AdvertController::class);



//Route::resource('/dashboard', ShowController::class);      
//Route::resource('/Dashboard', AdvertController::class);

