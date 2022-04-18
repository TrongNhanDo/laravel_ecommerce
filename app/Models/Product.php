<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $data = [];

    protected $fillable =[
        'id_cate',
        'product_name',
        'description',
        'image',
        'price',
        'amount'
    ];

    public function categories(){
        return $this->belongsTo(Category::class,'id_cate','id');
    }
}
