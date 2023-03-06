<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductContent;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $data['count_1']    = Order::count();
       $data['count_2']    = ProductContent::where('status',1)->count();
        $data['count_3'] = ProductCategory::where('status',1)->count();
        $data['count_4']  = Blog::where('status',1)->count();
        return view('admin.index', $data);
    }
}