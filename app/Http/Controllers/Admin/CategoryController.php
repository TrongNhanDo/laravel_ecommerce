<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $cate  =  Category::all();
        return view('admin.page.category.list',['cate'=>$cate]);
        
    }
    public function insert(){
        return view('admin.page.category.insert');
    }
    public function store(\Illuminate\Http\Request $request){
        try{
            $kq = Category::where('cate_name',$request['cate_name'])->get()->count();
            if($kq > 0){
                return view('admin.page.category.insert',['kq'=>'Tên loại sản phẩm đã tồn tại!']);
            }
            $new_cate = new Category();
            $new_cate->cate_name = $request['cate_name'];
            $new_cate->save();
            return view('admin.page.category.insert',['kq'=>'Thêm loại sản phẩm thành công!']);
        }catch(Exception $ex){
            return view('admin.page.category.insert',['kq'=>'Thêm loại sản phẩm thất bại']);
        }
    }
    public function edit($id){
        $cate = Category::findOrFail($id);
        return view('admin.page.category.edit',['cate'=>$cate]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category->cate_name == $request->cate_name){
            return view('admin.page.category.edit',['cate'=>$category,'msg_error'=>'Tên mới phải khác tên cũ']);
        }else{
            $category->cate_name = $request->cate_name;
            $category->save();
            return view('admin.page.category.edit',['cate'=>$category,'kq'=>'Cập nhật thành công!']);
        }
    }
    public function destroy($id){
        Category::destroy($id);
        return redirect('admin_listcategory');
    }
}
