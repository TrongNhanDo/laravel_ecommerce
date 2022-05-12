<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.page.category.list');
        
    }
    public function getcategory(){
        $cate = Category::all();
        $out = "";
        foreach($cate as $cat){
            $out .= "<tr>
                <td>".$cat->id."</td>
                <td>".$cat->cate_name."</td>
                <td>".$cat->created_at."</td>
                <td>".$cat->updated_at."</td>
                <td>
                <div class='action'>
                    <button value='".$cat->id."' data-toggle='modal' data-target='#edit_cate' type='button' class='btn btn-success detail' style='margin-right: 30px'>Detail</button>
                    <button value='".$cat->id."' class='button-delete btn btn-danger delete' type='submit'>Delete</button>
                </div>
                </td>
            </tr>";
        }
        return response()->json($out);
    }
    public function store(\Illuminate\Http\Request $request){
        try{
            $kq = Category::where('cate_name',$request['cate_name'])->get()->count();
            if($kq > 0){
                return response()->json(2);
            }
            $new_cate = new Category();
            $new_cate->cate_name = $request['cate_name'];
            $new_cate->save();
            return response()->json(1);
        }catch(Exception $ex){
            return response()->json(0);
        }
    }
    public function detail($id){
        $cate = Category::find($id);
        $out = $cate;
        return response()->json($out);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category->cate_name == $request->cate_name){
            return response()->json(2);
        }else{
            $category->cate_name = $request->cate_name;
            if($category->save()){
                return response()->json(1);
            }else{
                return response()->json(0);
            }
        }
    }
    public function destroy($id){
        if(Category::destroy($id)){
            return response()->json(1);
        }else{
            return response()->json(0);
        }        
    }
}
