<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\manger;

class MangerController extends Controller
{
    function index(){
        
        $data=manger::select("*")->orderby("id","ASC")->get();

        return view ('manger', ['data'=>$data]);
    }
}
