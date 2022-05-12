<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show_login(){
        return view('dashboard.page.user.login');
    }
    public function login(Request $request){
        $name = $request->username;
        $hashedPassword = User::where('email',$name)->take(1)->get();
        if($hashedPassword->count()==0){
            return response()->json(2);
        }
        foreach($hashedPassword as $hash){
            $mk = $hash->password;
            $tk = $hash->name;
            $id = $hash->id;
        }
        if (Hash::check($request->password,$mk)) {
            session()->put('login',true);
            session()->put('username',$tk);
            session()->put('userid',$id);
            //update number product in shpping cart
            $cart = Cart::where('user_id',session()->get('userid'))->get();
            $sum = 0;
            foreach($cart as $ca){
                $sum += $ca->amount;
            }
            session()->put('sum_product',$sum);
            return response()->json(1);
        }
        return response()->json(0);
    }
    public function profile($id){
        if(session()->has('login') && session()->get('login')===true){
            $user = User::find(session()->get('userid'));
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
            return response()->json(2);
        }else{
            $account = new User();
            $account->name = $request->fullname;
            $account->email= $request->email;
            $account->password= bcrypt($request->password);
            $account->image = '';
            // $account->image= basename($_FILES['image']['name']);
            $account->address= $request->address;
            $account->phone= $request->phone;

            // $file = $account->image;
            // $target_dir = "image_upload/";
            // $target_file = $target_dir.$file;
            // if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            //     $account->save();
            //     return view('dashboard.page.user.register',['msg_success'=>'Register success!']);
            // }else{
            //     return view('dashboard.page.user.register',['msg_error'=>'Upload image fail!']);
            // }
            if($account->save()){
                return response()->json(1);
            }else{
                return response()->json(0);
            }
        }
    }
    public function logout(){
        session::flush();
        $cart = Cart::where('session_id',session()->getId())->get();
        $sum = 0;
        foreach($cart as $ca){
            $sum += $ca->amount;
        }
        session()->put('sum_product',$sum);
        return redirect('/');
    }
}
