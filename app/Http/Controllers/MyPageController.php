<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $para1 = ['username'=>$user->name];
        $items = DB::select('select * from product where name in (select productName from myPage where name = :username)',$para1);
        $param = ['items'=>$items,'user'=>$user];
        return view('MyPage.index',$param);
    }
}
