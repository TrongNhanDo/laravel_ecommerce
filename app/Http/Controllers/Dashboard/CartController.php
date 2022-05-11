<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(){
        return view('dashboard.page.cart.cart_ajax');
    }
    public function index(){
        $out = '';
        if(session()->has('login') && session()->get('login')==true){
            $cart = Cart::where('user_id',session()->get('userid'))->get();
            $sum = 0;
            $i=0;
            foreach($cart as $ca){
                $i++;
                $sum += $ca->amount;
                $out .= "<tr><td>".$i."</td>
                <td>".$ca->product_name."</td>
                <td>
                    <img src='image_upload/".$ca->image."' alt='' width='200'>
                </td>
                <td>".number_format($ca->price)."đ</td>
                <td>
                    <input type='hidden' name='product_id' id='product_id' value='".$ca->id."'>
                    <input type='number' name='amount' id='amount' min='1' value='".$ca->amount."'>
                    <button type='submit' class='btn_update' value='".$ca->id."'>Update</button>
                    </form>
                </td>
                <td>".number_format($ca->price * $ca->amount)."đ</td>
                <td>
                    <button class='btn-delete' id='btn_delete' value='".$ca->id."'>Delete</button>
                </td></tr>";
            }
            session()->put('sum_product',$sum);
            // return view('dashboard.page.cart.cart_ajax',['cart'=>$cart]);
            return response()->json(['out'=>$out,'sum'=>$sum]);
        }else{
            $cart = Cart::where('session_id',session()->getId())->get();
            $sum = 0;
            $i=0;
            foreach($cart as $ca){
                $i++;
                $sum += $ca->amount;
                $out .= "<tr><td>".$i."</td>
                <td>".$ca->product_name."</td>
                <td>
                    <img src='image_upload/".$ca->image."' alt='' width='200'>
                </td>
                <td>".number_format($ca->price)."đ</td>
                <td>
                    <input type='hidden' name='product_id' id='product_id' value='".$ca->id."'>
                    <input type='number' name='amount' id='amount' min='1' value='".$ca->amount."'>
                    <button type='submit' class='btn_update' value='".$ca->id."'>Update</button>
                </td>
                <td>".number_format($ca->price * $ca->amount)."đ</td>
                <td>
                    <button class='btn-delete' id='btn_delete' value='".$ca->id."'>Delete</button>
                </td></tr>";
            }
            session()->put('sum_product',$sum);
            // return view('dashboard.page.cart.cart_ajax',['cart'=>$cart]);
            return response()->json(['out'=>$out,'sum'=>$sum]);
        }
        
    }
    public function store(Request $request){
        if(session()->has('login') && session()->get('login')==true){
            $cart = Cart::where('product_id',$request->product_id)->where('user_id',session()->get('userid'))->get();
            if($cart->count() > 0){
                foreach($cart as $ca){
                    $cart_id = $ca->id;
                }
                $pre_cart = Cart::find($cart_id);
                $pre_cart->amount += $request->amount;
                $pre_cart->save();
            }else{
                $product = Product::find($request->product_id);
                $newcart = new Cart();
                $newcart->user_id = session()->get('userid');
                $newcart->product_id = $product->id;
                $newcart->product_name = $product->product_name;
                $newcart->image = $product->image;
                $newcart->price = $product->price;
                $newcart->amount = $request->amount;
                $newcart->save();
            }
            $l_cart = Cart::where('user_id',session()->get('userid'))->get();
            $sum =0;
            foreach($l_cart as $ca){
                $sum += $ca->amount;
            }
            session()->put('sum_product',$sum);
            // return redirect('cart')->with('cart',$l_cart);
            return back();
        }else{
            $product = Product::find($request->product_id);
            $newcart = new Cart();
            $newcart->session_id = session()->getId();
            $newcart->product_id = $product->id;
            $newcart->product_name = $product->product_name;
            $newcart->image = $product->image;
            $newcart->price = $product->price;
            $newcart->amount = $request->amount;
            $newcart->save();

            $l_cart = Cart::where('session_id',session()->getId())->get();
            $sum =0;
            foreach($l_cart as $ca){
                $sum += $ca->amount;
            }
            session()->put('sum_product',$sum);
            //return redirect('cart')->with('cart',$l_cart);
            return back();
        }
    }
    public function update(Request $request,$id){
        $cart  = Cart::find($id);
        $cart->amount = $request->amount;
        $cart->save();

        return response()->json(['msg'=>1]);
    }
    public function delete($id){;
        Cart::destroy($id);      
        return response()->json(['msg'=>1]);
    }
    public function delete_all(){
        if(session()->has('login') && session()->get('login')==true){
            $cart = Cart::where('user_id',session()->get('userid'))->get();
            foreach($cart as $ca){
                Cart::destroy($ca->id);
            }
            return response()->json(['msg'=>1]);
        }else{
            $cart = Cart::where('session_id',session()->getId())->get();
            foreach($cart as $ca){
                Cart::destroy($ca->id);
            }
            return response()->json(['msg'=>1]);
        }
    }
}
