<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showlogin(){
        return view('admin.page.login');
    }
    public function login(Request $request){
        if($request->username != 'admin@gmail.com'){
            return view('admin.page.login',['msg'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
        if(Auth::attempt(['email'=>$request->username,'password'=>$request->password])){
            return redirect('/admin');
        }else{
            return view('admin.page.login',['msg'=>'Tài khoản hoặc mật khẩu không chính xác']);
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
