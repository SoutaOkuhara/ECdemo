<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request){
        $items = DB::select('select * from user');
        return view('user.index',['items'=>$items]);
    }

    public function add(Request $request){
        return view('user.add');
    }

    public function create(Request $request){
        $param = [
            'name'=>$request->name,
            'mail'=>$request->mail,
            'age'=>$request->age,
        ];
        DB::insert('insert into user (name,mail,age) values (:name,:mail,:age)',$param);
        return redirect('/user');
    }
}
