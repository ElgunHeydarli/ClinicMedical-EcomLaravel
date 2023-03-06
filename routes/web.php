<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\SliderController;
use App\Http\Controllers\Back\ServiceController;
use App\Http\Controllers\Back\PartnerController;
use App\Http\Controllers\Back\SettingController;
use App\Http\Controllers\Back\ProductCategoryController;
use App\Http\Controllers\Back\ProductContentController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\QuestionAnswerController;
use App\Http\Controllers\Back\CommentController;
use App\Http\Controllers\Back\OrderController;
use App\Http\Controllers\Front\FrontController;

/*
|--------------------------------------------------------------------------
| Front-End Routes
|--------------------------------------------------------------------------
*/
Route::get('/locale/{locale}',function($locale) {
    Session::put('locale',$locale);
    return redirect()->back();
});

Route::get('/', [FrontController::class, 'homepage'])->name('homepage');
Route::get('/haqqimizda', [FrontController::class, 'about'])->name('about');
Route::get('/xeberler', [FrontController::class, 'blog'])->name('blog');
Route::post('/xeberler', [FrontController::class, 'searchBlog'])->name('blog.search');
Route::get('/xeberler/{blog_slug}', [FrontController::class, 'singleBlog'])->name('blog.single');
Route::get('/xidmetler/{service_slug}', [FrontController::class, 'singleService'])->name('service');
Route::get('/kateqoriya/{category_slug}', [FrontController::class, 'productCategory'])->name('product.category');
Route::post('/mehsullar/axtaris', [FrontController::class, 'productSearch'])->name('product.search');
Route::get('/mehsullar/{product_slug}', [FrontController::class, 'productSingle'])->name('product.single');
Route::get('/elaqe', [FrontController::class, 'contact'])->name('contact');
Route::post('/elaqe', [FrontController::class, 'sendMessage'])->name('send.message');
Route::get('/order/{order_slug}', [FrontController::class, 'orderGet'])->name('order.get');
Route::post('/order', [FrontController::class, 'orderPost'])->name('order.post');

/*
|--------------------------------------------------------------------------
| Back-End Routes
|--------------------------------------------------------------------------
*/


Route::group([ 'middleware' => ['auth:sanctum', 'verified'] ], function () {

//Dashboard
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

//Orders
Route::resource('/admin/orders', OrderController::class)->except(['create', 'store']);
Route::get('/admin/orders/status', [OrderController::class, 'status'])->name('admin.order.status');

//Settings
Route::get('/admin/settings/general',  [SettingController::class, 'indexGeneral'])->name('admin.setting.general');
Route::get('/admin/settings/contact',  [SettingController::class, 'indexContact'])->name('admin.setting.contact');
Route::get('/admin/settings/social',   [SettingController::class, 'indexSocial'])->name('admin.setting.social');
Route::get('/admin/settings/about',    [SettingController::class, 'indexAbout'])->name('admin.setting.about');
Route::get('/admin/settings/about-1',    [SettingController::class, 'indexAbout_1'])->name('admin.setting.about1');
Route::get('/admin/settings/home-page-seo', [SettingController::class, 'homepageSeo'])->name('admin.seo.homepage');
Route::get('/admin/settings/site-seo',   [SettingController::class, 'siteeSeo'])->name('admin.seo.site');
Route::post('/admin/settings/update',  [SettingController::class, 'update'])->name('admin.setting.update');

//Question Answer
Route::resource('/admin/question-answer', QuestionAnswerController::class)->except(['create', 'show']);
Route::get('/admin/question-answer/status', [QuestionAnswerController::class, 'status'])->name('admin.question-answer.status');

//Slider Category
Route::resource('/admin/slider', SliderController::class)->except(['create','show']);
Route::get('/admin/slider/status', [SliderController::class, 'status'])->name('admin.slider.status');

//Product Category
Route::resource('/admin/product/category', ProductCategoryController::class)->except(['create','show']);
Route::get('/admin/product/category/status', [ProductCategoryController::class, 'status'])->name('admin.product.category.status');

//Product Content
Route::resource('/admin/product/content',    ProductContentController::class)->except(['show']);
Route::get('/admin/product/specification/{id}', [ProductContentController::class, 'add_specification'])->name('admin.product.specification');
Route::post('/admin/product/specification/{id}', [ProductContentController::class, 'store_specification'])->where('id', '[0-9]+');
Route::get('/admin/product/edit_specification/{id}', [ProductContentController::class, 'edit_specification'])->name('admin.product.edit_specification');
Route::post('/admin/product/edit_specification/{id}', [ProductContentController::class, 'update_specification'])->where('id', '[0-9]+');
Route::get('/admin/product/delete_specification/{id}', [ProductContentController::class, 'delete_specification'])->where('id', '[0-9]+');
Route::get('/admin/product/content/status', [ProductContentController::class, 'status'])->name('admin.product.content.status');
Route::get('/admin/product/trashed',       [ProductContentController::class, 'trashedIndex'])->name('admin.product.content.trashed');
Route::get('/admin/product/recover/{id}',  [ProductContentController::class, 'recover'])->name('admin.product.content.recover');
Route::get('/admin/product/hard-delete/{id}', [ProductContentController::class, 'hardDelete'])->name('admin.product.content.harddelete');

//Services
Route::resource('/admin/services', ServiceController::class)->except(['create','show']);
Route::get('/admin/services/status', [ServiceController::class, 'status'])->name('admin.service.status');

//Partners
Route::resource('/admin/partners', PartnerController::class)->except(['create','show']);
Route::get('/admin/partners/status', [PartnerController::class, 'status'])->name('admin.partners.status');

//Blog
Route::resource('/admin/blog', BlogController::class)->except(['show']);
Route::get('/admin/blog/status', [BlogController::class, 'status'])->name('admin.blog.status');

//Comment
Route::resource('/admin/comment', CommentController::class)->except(['create', 'show']);
Route::get('/admin/comment/status', [CommentController::class, 'status'])->name('admin.comment.status');


//Profil
Route::get('/admin/profil', function(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('admin.profil.index')->with('user',$user);
})->name('admin.profil');

});
