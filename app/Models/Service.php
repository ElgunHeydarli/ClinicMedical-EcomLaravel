<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    protected $fillable = [
        'lang',
        'title',
        'content_title_1',
        'content_image_1',
        'content_description_1',
        'content_title_2',
        'content_image_2',
        'content_description_2',
        'sort',
        'slug',
        'status'
    ];
}
