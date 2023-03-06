<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'product_id',
        'name',
        'surname',
        'email',
        'tel',
        'city',
        'address',
        'address_2',
        'note',
        'payment_method',
        'status'
    ];

    public function getProduct()
    {
        return  $this->hasOne('App\Models\ProductContent', 'id', 'product_id');
    }
}
