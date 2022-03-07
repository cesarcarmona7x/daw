<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductosController extends Controller
{
    //
    public function miFuncion(){
        $categorias=DB::table('categories')->get();
        return view('dash.productos')
            ->with('categorias',$categorias);
    }
    public function insertar(Request $request){
        $validacion=Validator::make($request->all(),[
            'name'=>'required|min:4|max:100',
            'description'=>'required|min:5',
            "price"=>'required',
            'img'=>'required|mimes:jpg,jpeg,png,webp|max:2000',
            'btype'=>'required',
            'category'=>'required'
        ]);
        if($validacion->fails()){
            echo "Vales pura verga";
            return back()
                ->withInput()
                ->with('ErrorInsert',"Favor de llenar todos los campos")
                ->withErrors($validacion);
        }
        else{
            echo "Eres la verga";
        }
        dd($request->name);
    }
}
