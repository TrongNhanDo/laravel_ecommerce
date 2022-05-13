<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showlogin(){
        return view('admin.page.login');
    }
    public function login(Request $request){
        if($request->username != 'admin@gmail.com'){
            return response()->json(0);
        }
        if(Auth::attempt(['email'=>$request->username,'password'=>$request->password])){
            return response()->json(1);
        }else{
            return response()->json(0);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
    public function index(){
        $user = User::all();
        return view('admin.page.user.list',['user'=>$user]);
    }
    public function insert(){
        return view('admin.page.user.insert');
    }
    public function store(Request $request){
        
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.page.user.edit',['user'=>$user]);
    }
    public function update(Request $request, $id){
        User::where('id',$id)->update($request->except(['_token']));
        return redirect('admin_listuser');
    }
}
