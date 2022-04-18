<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show_login(){
        return view('dashboard.page.user.login');
    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->username,'password'=>$request->password])){
            return redirect('/');
        }else{
            return view('dashboard.page.user.login',['msg_error'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
    }
    public function profile($id){
        if(Auth::check()){
            $user = User::find($id);
            return view('dashboard.page.user.detail',['user'=>$user]);
        }else{
            return redirect('login');
        }
    }
    public function show_register(){
        return view('dashboard.page.user.register');
    }
    public function register(Request $request){
        $kq = User::where('email',$request->email)->get()->count();
        if($kq > 0){
            return view('dashboard.page.user.register',['msg_error'=>'Email already exists']);
        }else{
            $account = new User();
            $account->name = $request->fullname;
            $account->email= $request->email;
            $account->password= bcrypt($request->password);
            $account->image= basename($_FILES['image']['name']);
            $account->address= $request->address;
            $account->phone= $request->phone;

            $file = $account->image;
            $target_dir = "image_upload/";
            $target_file = $target_dir.$file;
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $account->save();
                return view('dashboard.page.user.register',['msg_success'=>'Register success!']);
            }else{
                return view('dashboard.page.user.register',['msg_error'=>'Upload image fail!']);
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
