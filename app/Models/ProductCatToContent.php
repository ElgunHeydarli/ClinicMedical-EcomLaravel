<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatToContent extends Model
{
    use HasFactory;
    
    protected $table = "product_cat_to_contents";
    
    protected $fillable = [
        'product_category_id ',
        'product_content_id '
    ];

    public $timestamps = false; 
}
