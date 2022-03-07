<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\ProductosController;

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
    return view('front.index');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/productos', function () {
    $color = "#fa0011";
    $usuario = "Doroteo Arango";
    $num = rand(1, 50);
    return view('front.productos')
        ->with('colorsote', $color)
        ->with('usuario', $usuario)
        ->with('numero', $num);
});
Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/dashboard',function(){
    return view('dash.index');
});

Route::get('/admin',function(){
    return view('dash.index');
});

Route::get('/admin/productos',[ProductosController::class,'miFuncion']);
Route::post('/admin/productos',[ProductosController::class,'insertar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
