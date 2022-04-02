<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Validator;
use File;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categorias=DB::table('categories')->get();
        return view('dash.categorias')
            ->with('categorias',$categorias);
    }
    public function store(Request $request){
        $validacion=Validator::make($request->all(),[
            'name'=>'required|min:4|max:100',
            'img'=>'required|mimes:jpg,jpeg,png,webp|max:2000'
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
            $img=$request->file('img');
            $name=time().'.'.$img->getClientOriginalExtension();
            $destination_path=public_path('categorias');
            $request->img->move($destination_path,$name);
            $nuevo=Category::create([
                'category'=>$request->name,
                'img'=>$name
            ]);
            return back()
                ->with('Listo','Se ha insertado correctamente');
        }
    }
    public function destroy($id){
        $categoria=Category::find($id);
        if($categoria->img != 'default.png'){
            if(File::exists(public_path('categorias/'.$categoria->img))){
                unlink(public_path('categorias/'.$categoria->img));
            }
        }
        $categoria->delete();
        return back()->with('Listo',' El registro se eliminó correctamente.');
    }
}
