<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $param = ['user'=>$user];
        return view('Home.index',$param);
    }
}
