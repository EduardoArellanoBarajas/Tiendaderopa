<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsControlle;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('TiendaRopa',ProductsControlle::class)
->except(['show'])
->middleware('auth');


Route::get('/delete-Producto/{id}', array(
    'as' => 'deleteProducto',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\ProductsControlle@deleteProducto'
 ));
 
 Route::get('/imprimir', [App\Http\Controllers\GeneradorController::class, 'imprimir'])->name('imprimir');

