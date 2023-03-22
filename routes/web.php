<?php

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
Route::get('/', 'ProductController@main')->name('main');

//Ruta para mostrar los productos
Route::get('products', 'ProductController@index')->name('products.index');

//Ruta para el formulario de crear productos
Route::get('products/create', 'ProductController@create')->name('products.create');

//Ruta para guardar los datos por peticion post
Route::post('products', 'ProductController@store')->name('products.store ');

//Ruta para mostrar un producto por ID
Route::get('products/{product}', 'ProductController@show')->name('products.show');

//Ruta para editar un producto por id
Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

//Ruta para actualizar un proucto por id
Route::match(['put', 'patch'], 'products/{product}', 'ProductController@update')->name('products.update');

//Ruta para eliminar un producto por id
Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');
