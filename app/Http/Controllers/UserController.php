<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Person;

class UserController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from users');
        $param = ['items'=>$items,'user'=>$user];
        return view('people.index',$param);
    }

    public function getAuth(Request $request){
        $param = ['message'=>'ログインしてください。'];
        return view('people.auth',$param);
    }

    public function postAuth(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $msg='ログインしました。('.Auth::user()->name.')';
        }else{
            $msg = 'ログインに失敗しました。';
        }
        return view('people.auth',['message'=>$msg]);
    }
}
