<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from product where name in (select productname from host_selling order by salecount desc) limit 5');
        //$items = DB::select('select productname from host_selling order by salecount desc');
        $param = ['user'=>$user,'items'=>$items];
        return view('Home.index',$param);
    }
}
