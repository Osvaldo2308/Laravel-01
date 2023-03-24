<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// El orden de rutas importa; esto para no ser opacadas
// por otras rutas y ejecuten sus acciones antes de la
// ruta buscada

//Ruta para el index de la pagina
Route::get('/', 'MainController@index')->name('main');

Route::resource('products', 'ProductController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
