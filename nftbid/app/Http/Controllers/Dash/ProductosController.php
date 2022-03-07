<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    //
    function miFuncion(){
        $categorias=DB::table('categories')->get();
        dd($categorias);
        return view('dash.productos');
    }
}
