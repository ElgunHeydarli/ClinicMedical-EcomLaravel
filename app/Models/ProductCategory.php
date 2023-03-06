<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = "porduct_categories";

    protected $fillable = [
        'parent_id',
        'lang',
        'title',
        'sort',
        'slug',
        'status'
    ];

    public function getContent()
    {
        return $this->belongsToMany('App\Models\ProductContent', 'product_cat_to_contents');
    }
}
