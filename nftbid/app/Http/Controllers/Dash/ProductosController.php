<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Nft;
use Illuminate\Support\Facades\Hash;

class ProductosController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $categorias=DB::table('categories')->get();
        $productos=DB::table('nfts')->orderBy('id','DESC')->get();
        return view('dash.productos')
            ->with('categorias',$categorias)
            ->with('nfts',$productos);
    }
    public function store(Request $request){
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
            $token_id=Hash::make(rand(0,999999999));
            $token_standard=Hash::make(rand(0,999999999));
            $img=$request->file('img');
            $name=time().'.'.$img->getClientOriginalExtension();
            $destination_path=public_path('nfts');
            $request->img->move($destination_path,$name);
            $nuevo=Nft::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'base_price'=>$request->price,
                'img'=>$name,
                'blockchain_type'=>$request->btype,
                'id_category'=>$request->category,
                'token_id'=>$token_id,
                'token_standard'=>$token_standard,
                'metadata'=>'',
                'id_user'=>1,
                'likes'=> 0
            ]);
            return back()
                ->with('Listo','Se ha insertado correctamente');
        }
    }
}
