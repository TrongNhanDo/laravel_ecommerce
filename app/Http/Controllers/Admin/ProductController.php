<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $cate = Category::all();
        return view('admin.page.product.list',['cate'=>$cate]);
    }
    public function getproduct(){
        // $product = Product::all();
        //$product = DB::table('products')->join('categories', 'products.id_cate', '=', 'categories.id')->select('products.*', 'categories.cate_name')->simplePaginate(8);
        $product = DB::select('select p.* , c.cate_name from products p,categories c where p.id_cate = c.id ');
        $out = "";
        foreach($product as $pro){
            $out .= "<tr>
                <td>".$pro->id."</td>
                <td>".$pro->cate_name."</td>
                <td>".$pro->product_name."</td>
                <td style='width: 15%'>
                <img src='".asset('image_upload')."/".$pro->image."' alt=''>
                </td>
                <td>".$pro->description."</td>
                <td>".number_format($pro->price)."đ</td>
                <td>".$pro->amount."</td>
                <td>".$pro->view."</td>
                <td>".$pro->status."</td>
                <td>".$pro->created_at."</td>
                <td>".$pro->updated_at."</td>
                <td>
                <div class='action'>
                    <button style='margin-right: 20px' type='button' value='".$pro->id."' class='btn btn-success detail' data-toggle='modal' data-target='#detail_product'>
                            Detail
                    </button>
                    <button class='button-delete btn btn-danger' type='submit' value='".$pro->id."'>Delete</button>
                </div>
                </td>
            </tr>";
        }
        return response()->json($out);
    }
    public function detail($id){
        // $product = DB::table('products')->join('categories', 'products.id_cate', '=', 'categories.id')->select('products.*', 'categories.cate_name')->get();
        $product = DB::select('select p.* , c.cate_name from products p,categories c where p.id_cate = c.id');
        foreach($product as $pro){
            if($pro->id == $id){
                $out = $pro;
            }
        }
        return response()->json($out);
    }
    public function store(Request $request){
        $cate = Category::all();
        try{
            $kq = Product::where('product_name',$request['pro_name'])->get()->count();
            if($kq > 0){
                return view('admin.page.product.insert',['cate'=>$cate,'kq'=>'Tên sản phẩm đã tồn tại!']);
            }
            $newpro = new Product();
            $newpro->id_cate = $request->pro_cate;
            $newpro->product_name = $request->pro_name;
            $newpro->description = $request->pro_des;
            $newpro->price = $request->pro_price;
            $newpro->amount = $request->pro_amount;
            
            $newpro->image = basename($_FILES['pro_image']['name']);
            $file = $newpro->image;
            $target_dir = "image_upload/";
            $target_file = $target_dir.$file;
            if(move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)){
                $newpro->save();
                return response()->json(1);
            }else{
                return response()->json(0);
            }
        }catch(Exception $ex){
            return response()->json(0);
        }
    }
    public function update(Request $request, $id)
    {
        if(Product::where('id',$id)->update($request->except(['_token']))){
            return response()->json(1);
        }else{
            return response()->json(0);
        }
    }
    public function destroy($id){
        if(Product::destroy($id)){
            return response()->json(1);
        }else{
            return response()->json(0);
        }
    }
}
