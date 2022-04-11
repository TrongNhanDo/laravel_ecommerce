<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        // take($limit)
        $cate = DB::table('categories')->take(3)->get();
        $prod = DB::table('products')->take(3)->get();
        return view('Dashboard.index',['cate'=>$cate,'prod'=>$prod]);
    }
}
