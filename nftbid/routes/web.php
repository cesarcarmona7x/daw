<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\ProductosController;
use App\Http\Controllers\Dash\CategoriesController;
use App\Http\Controllers\Front\IndexController;

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

Route::get('/', [IndexController::class,'index']);

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/',function(){
        return view('dash.index');
    });
    
    Route::resource('productos',ProductosController::class);
    
    Route::resource('categorias',CategoriesController::class);
    Route::post('/categorias/update',[CategoriesController::class,'update']);
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
