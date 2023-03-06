<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Services\ProductCategoryService;
use App\Models\ProductContent;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\QuestionAnswer;
use App\Models\Service;
use App\Models\ProductCategory;
use App\Models\ProductCatToContent;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Mail;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    protected $setting, $prod_categories, $db_cat, $db_prod;

    public function __construct(SettingService $setting, ProductCategoryService $prod_categories)
    {
        $this->setting = $setting;
        $this->prod_categories = $prod_categories;
        view()->share('setting', $this->setting->getById());
        view()->share('prod_categories', $this->prod_categories->getAll()->where('status', 1));
        view()->share('service_categories', Service::where('status', 1)->orderBy('sort', 'ASC')->get());
    }

    public function homepage()
    {
        $slider = Slider::where('status', 1)->orderBy('sort', 'ASC')->get();
        $bestsellers = ProductContent::where('status', 1)->where('sales_status', 1)->orderBy('sort', 'ASC')->get();
        foreach($bestsellers as $item)
        {
            $item->images = json_decode($item->images);
        }
        $new_products = ProductContent::where('status', 1)->where('sales_status', 2)->orderBy('sort', 'ASC')->get();
        foreach($new_products as $item)
        {
            $item->images = json_decode($item->images);
        }
        $comments = Comment::where('status', 1)->orderBy('sort', 'ASC')->get();
        $blog = Blog::where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
        $partners = Partner::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('front.homepage',compact('slider', 'bestsellers', 'new_products', 'comments', 'blog', 'partners'));
    }

    public function productCategory($category_slug)
    {
        $single_category = ProductCategory::where('slug', $category_slug)->first();
        if(empty($single_category)){ abort(404);}
        $partners = Partner::where('status', 1)->orderBy('id', 'DESC')->get();
        $products = $single_category->getContent()->where('status', 1)->paginate(12);
        foreach($products as $item)
        {
            $item->images = json_decode($item->images);
        }
      //  print_r($single_category->getContent);die;
        return view('front.category')->with('single_category', $single_category)->with('partners', $partners)->with('products', $products);
    }

    public function productSingle($product_slug)
    {
        $product = ProductContent::where('slug', $product_slug)->first();
        $product->images = json_decode($product->images);

        return view('front.product-single')->with('product', $product);
    }

    public function productSearch(Request $request)
    {
        $this->db_cat = DB::table('porduct_categories');
        $this->db_prod = DB::table('product_contents');

        $qb = $this->db_prod;

        if($request->has('search')){
            $qb->where('status',1)->where('title', 'like', '%'.$request->search.'%' )->
            orWhere('description', 'like', '%'.$request->search.'%');
        }

        if($request->has('category')){
            $id = $this->db_cat->where('id', $request->category)->value('id');
            $p = ProductCatToContent::where('product_category_id', $id)->get();
            foreach($p as $item)
            {
                $qb->orWhere('id', $item->product_content_id );
            }
        }


        $products = $qb->paginate(12);

        foreach($products as $item)
        {
            $products[] = ProductContent::findOrFail($item->id);
        }

        foreach($products as $item)
        {
            $item->images = json_decode($item->images);
        }
        $partners = Partner::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('front.category')->with('partners', $partners)->with('products', $products);
    }

    public function about()
    {
        $question_answer = QuestionAnswer::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.about')->with('question_answer', $question_answer);
    }

    public function blog()
    {
        $blog = Blog::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('front.blog')->with('blog', $blog);
    }

    public function singleBlog($blog_slug)
    {
        $blog_single = Blog::where('slug', $blog_slug)->first();
        $blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->take(12)->get();
        return view('front.blog-single')->with('blogs', $blogs)->with('blog_single', $blog_single);
    }

    public function searchBlog(Request $request)
    {
        $blog = Blog::where('status', 1)->where('title', 'like', '%'.$request->search.'%')->orderBy('id', 'DESC')->paginate(6);
        return view('front.blog')->with('blog', $blog);
    }

    public function singleService($service_slug)
    {
        $service_single = Service::where('slug', $service_slug)->first();
        return view('front.service')->with('service_single', $service_single);
    }

    public function contact()
    {

        return view('front.contact');
    }

    public function sendMessage(Request $request)
    {

        Mail::raw(' Mesajı Göndərən : ' .$request->name.'<br />
                    Mesajı Göndərən Mail : '.$request->email. '<br />
                    Əlaqə Nömrəsi : '.$request->tel. '<br />
                    Mesaj Məzmunu : '.$request->message.'<br />'

        , function($message) use($request){
            $message->from($request->email, 'Jedai');
            $message->to('info@hamidhamidli.com');
            $message->subject($request->name. ' mesaj gonderdi!');
        });

     toastr()->success('Mesajınız Göndərildi');
     return redirect()->back();

    }

    public function orderGet($order_slug)
    {
        $product = ProductContent::where('slug', $order_slug)->first();
        return view('front.checkout')->with('product', $product);
    }

    public function orderPost(OrderRequest $request)
    {
        $product = ProductContent::where('slug', $request->slug)->first();
        $data = new Order;
        $data->product_id = $product->id;
        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->email = $request->email;
        $data->tel = $request->tel;
        $data->city = $request->city;
        $data->address = $request->address;
        $data->address_2 = $request->address_2;
        $data->note = $request->note;
        $data->payment_method = $request->payment_method;
        $data->save();
        toastr()->success('Sifarişiniz Göndərildi');
        return redirect('/');

    }
}
