<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        // take($limit)
        $cate = DB::table('categories')->take(6)->get();
        $prod = DB::table('products')->take(6)->get();
        return view('Dashboard.index',['cate'=>$cate,'prod'=>$prod]);
    }
}
