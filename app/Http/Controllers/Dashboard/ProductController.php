<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(Request $request){
        $cate = Category::all();
        if($request['txtsearch'] == ""){
            $product = Product::all();
        }else{
            $msg =$request['txtsearch'];
            // $product = Product::where('name, 'ILIKE', $search)->get();
            $product = Product::where('product_name','LIKE','%'.$msg.'%')->get();
            return view('dashboard.page.product.product',['product'=>$product,'cate'=>$cate]);
        }        
        return view('dashboard.page.product.product',['product'=>$product,'cate'=>$cate]);
    }
    public function detail($id){
        $product = DB::table('products')->join('categories', 'products.id_cate', '=', 'categories.id')->select('products.*', 'categories.cate_name')->where('products.id',$id)->get();
        if($product->count() > 0){
            return view('dashboard.page.product.productdetail',['product'=>$product]);
        }else{
            return redirect('/');
        }
    }
}
