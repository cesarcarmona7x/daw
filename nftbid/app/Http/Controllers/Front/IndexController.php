<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(){
        $categorias=DB::table('categories')->orderBy('category','ASC')->get();
        $productos=DB::table('nfts')->orderBy('id','DESC')->get();
        return view('front.index')
            ->with('categorias',$categorias)
            ->with('nfts',$productos);
    }

}
