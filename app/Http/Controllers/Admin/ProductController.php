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
        // $product = Product::all();
        $product = DB::table('products')->join('categories', 'products.id_cate', '=', 'categories.id')->select('products.*', 'categories.cate_name')->get();
        return view('admin.page.product.list',['product'=>$product]);
    }
    public function insert(){
        $cate = Category::all();
        return view('admin.page.product.insert',['cate'=>$cate]);
    }
    public function store(Request $request){
        $cate = Category::all();
        try{
            $kq = Product::where('product_name',$request['pro_name'])->get()->count();
            if($kq > 0){
                return view('admin.page.product.insert',['cate'=>$cate,'kq'=>'Tên sản phẩm đã tồn tại!']);
            }
            $newpro = new Product();
            // $newpro->fill($request->except(['_token']));
            $newpro->id_cate = $request->pro_cate;
            $newpro->product_name = $request->pro_name;
            $newpro->image = basename($_FILES['pro_image']['name']);
            $newpro->description = $request->pro_des;
            $newpro->price = $request->pro_price;
            $newpro->amount = $request->pro_amount;
            
            $file = $newpro->image;
            $target_dir = "image_upload/";
            $target_file = $target_dir.$file;
            if(move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)){
                $newpro->save();
                return view('admin.page.product.insert',['cate'=>$cate,'kq'=>'Thêm sản phẩm thành công!']);
            }else{
                return view('admin.page.product.insert',['cate'=>$cate,'kq'=>'Upload hình ảnh thất bại!']);
            }
        }catch(Exception $ex){
             return view('admin.page.product.insert',['cate'=>$cate,'kq'=>'Thêm sản phẩm thất bại']);
        }
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $cate = Category::all();
        return view('admin.page.product.edit',['product'=>$product,'cate'=>$cate]);
    }
    public function update(Request $request, $id)
    {
        Product::where('id',$id)->update($request->except(['_token']));
        return redirect('admin_listproduct');
    }
    public function destroy($id){
        Product::destroy($id);
        return redirect('admin_listproduct');
    }
}
