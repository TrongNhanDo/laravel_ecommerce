<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primarykey = 'id';
    protected $data = [];

    public function products(){
        return $this->hasMany(Product::class,'id_cate','id');
    }
    protected static function booted()
    {
        static::saved(function($category){
            return redirect('/login');
        });
    }
}
