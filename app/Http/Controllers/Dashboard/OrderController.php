<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        if(session()->has('login') && session()->get('login')==true){
            $cart = Cart::where('user_id',session()->get('userid'))->get();
        }else{
            $cart = Cart::where('session_id',session()->getId())->get();
        }
        return view('dashboard.page.payment.payment',['cart'=>$cart]);
    }
    public function payment_off(Request $request){
        if($request->pthuc == 'payment_off'){
            if(session()->has('login') && session()->get('login')==true){
                $user = User::find(session()->get('userid'));
                $cart = Cart::where('user_id',session()->get('userid'))->get();
                return view('dashboard.page.payment.payment_off',['cart'=>$cart,'user'=>$user]);
            }else{
                $cart = Cart::where('session_id',session()->getId())->get();
                return view('dashboard.page.payment.payment_off',['cart'=>$cart]);
            }
        }else if($request->pthuc == 'payment_vnpay'){

        }else if($request->pthuc == 'payment_momo'){

        }else{

        }
        
    }
}
