<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductContent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "product_contents";

    protected $fillable = [
        'lang',
        'title',
        'price',
        'description',
        'images',
        'sort',
        'sales_status',
        'slug',
        'status'
    ];

    public function getCategory()
    {
        return $this->belongsToMany('App\Models\ProductCategory', 'product_cat_to_contents');
    }

    public function image()
    {
        $data = $this->value('images');
        return json_decode($data);
    }

    public function product_specs()
    {
        return $this->hasMany('App\Models\Product_Specifications','product_id','id');
    }
}
