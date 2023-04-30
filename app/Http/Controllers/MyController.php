<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\manger;

use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
//     public function create(){
//         return view ('create');
//     }

//     public function update(){
//         return view ('update');
//     }

//     public function add(){
//         return view ('add');}

//     public function delete (){
//             return view ('delete');}
//
       /*public function index(){
        $user=new manger () ;
        return $user->get();
       }*/
       public function index(){
        //$user= manger::get() ;\
        $user=DB::table ('manger')->get();
        //dd($user[0]);
         return $user->first();
        //return response()->json($user,404);
       }
}
