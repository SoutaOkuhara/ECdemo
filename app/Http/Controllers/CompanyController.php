<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from company');
        $param = ['items'=>$items,'user'=>$user];
        return view('company.index',$param);
    }

    public function add(Request $request){
        return view('company.add');
    }

    public function create(Request $request){
        $param = [
            'name'=>$request->name,
            'mail'=>$request->mail,
        ];
        DB::insert('insert into company (name,mail) values (:name,:mail)',$param);
        return redirect('/admin/company');
    }

    public function del(Request $request){
        $param = ['id'=>$request->id];
        $item = DB::select('select * from company where id = :id',$param);
        return view('company.del',['form'=>$item[0]]);
    }

    public function remove(Request $request){
        $param = ['id'=>$request->id];
        DB::delete('delete from company where id = :id',$param);
        return redirect('/admin/company');
    }

    public function edit(Request $request){
        $param = ['id'=>$request->id];
        $item = DB::select('select * from company where id = :id',$param);
        return view('company.edit',['form'=>$item[0]]);
    }

    public function update(Request $request){
        $param = [
            'id'=>$request->id,
            'name'=>$request->name,
            'mail'=>$request->mail,
        ];
        DB::update('update company set name=:name,mail=:mail where id=:id',$param);
        return redirect('/admin/company');
    }
}
