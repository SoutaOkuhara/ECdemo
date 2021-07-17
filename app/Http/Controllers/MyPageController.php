<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from product');
        $param = ['items'=>$items,'user'=>$user];
        return view('MyPage.index',$param);
    }
}
