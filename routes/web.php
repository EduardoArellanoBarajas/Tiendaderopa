<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsControlle;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;




Route::get('/', [ProductsControlle::class, 'welcome'])->name('welcome');

Route::get('/verproducto', function () {
   return view('verproducto');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('TiendaRopa',ProductsControlle::class)
->except(['show'])
->middleware('auth');

Route::resource('categories',CategoriesController::class)
->except(['show'])
->middleware('auth');


Route::get('/delete-Producto/{id}', array(
    'as' => 'deleteProducto',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\ProductsControlle@deleteProducto'
 ));

 Route::get('/delete-Categoria/{id}', array(
    'as' => 'deleteCategoria',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\CategoriesController@deletecategoria'
 ));
 
 Route::get('/imprimir', [App\Http\Controllers\GeneradorController::class, 'imprimir'])->name('imprimir');

 Route::get('/imprimir-productos', [App\Http\Controllers\GeneradorController::class, 'imprimirProductos'])->name('imprimir.productos');
