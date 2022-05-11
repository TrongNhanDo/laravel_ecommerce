<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(Request $request){
        $cate = Category::all();
        // $product = Product::all();
        $product = Product::paginate(8);
        return view('dashboard.page.product.product_ajax',['product'=>$product,'cate'=>$cate]);        
    }
    public function detail($id){
        $product = DB::table('products')->join('categories', 'products.id_cate', '=', 'categories.id')->select('products.*', 'categories.cate_name')->where('products.id',$id)->get();
        if($product->count() > 0){
            foreach($product as $pro){
                $prod = $pro;
            }
            return view('dashboard.page.product.productdetail',['product'=>$prod]);
        }else{
            return redirect('/');
        }
    }
    public function test(){
        $cate = Category::all();
        $product = Product::all();
        return view('dashboard.page.product.test',['product'=>$product,'cate'=>$cate]);
    }
    public function search(Request $request){
        $output = '';
        $key = $_GET['txtsearch'];
        if($key == ''){
            $product = Product::all();
        }else{
            $product = Product::where('product_name','LIKE','%'.$key.'%')->get();
        }   
        if($product->count() == 0 ){
            $output = "<div class='col-md-12'>
                            <h1 style='text-align: center;'>No product yet!</h1>
                            <a class='read_more' href='/products'>See other products!</a>
                        </div>";
        }else{
            foreach($product as $pro){
                $output .= "<div class='col-md-3 margin_bottom1 prod'>
                            <div class='product_box'>
                                <figure><img title='".$pro->product_name."' src='image_upload/".$pro->image."' alt='#'></figure>
                                <h4 style='padding: 10px;'>".$pro->product_name."</h4>
                                <h5>".$pro->description."</h5>
                                <h4>".number_format($pro->price)."đ</h4>
                                <a title='' href='/products/".$pro->id."'>Detail</a>
                            </div>
                        </div>";
            }
        }
        
        return response()->json($output);
    }
    public function search_cate(){
        $output = '';
        $key = $_GET['cate_key'];
        if($key == ''){
            $product = Product::all();
        }else{
            $product = Product::where('id_cate',$key)->get();
        }   
        if($product->count() == 0 ){
            $output = "<div class='col-md-12'>
                            <h1 style='text-align: center;'>No product yet!</h1>
                            <a class='read_more' href='/products'>See other products!</a>
                        </div>";
        }else{
            foreach($product as $pro){
                $output .= "<div class='col-md-3 margin_bottom1 prod'>
                            <div class='product_box'>
                                <figure><img title='".$pro->product_name."' src='image_upload/".$pro->image."' alt='#'></figure>
                                <h4 style='padding: 10px;'>".$pro->product_name."</h4>
                                <h5>".$pro->description."</h5>
                                <h4>".number_format($pro->price)."đ</h4>
                                <a title='' href='/products/".$pro->id."'>Detail</a>
                            </div>
                        </div>";
            }
        }
        
        return response()->json($output);
    }
}
