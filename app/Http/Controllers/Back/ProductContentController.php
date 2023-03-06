<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductContentRequest;
use App\Models\Product_Specifications;
use App\Services\ProductContentService;
use App\Models\ProductCatToContent;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class ProductContentController extends Controller
{
    protected $service;

    public function __construct(ProductContentService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = $this->service->getPaginate();
        return view('admin.product.product_index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     * xususiyyet elave et
     * @return \Illuminate\Http\Response
     */

    public function add_specification($id)
    {
//        $data = $this->service->getPaginate();
        return view('admin.product.add_specification')->with(compact('id'));
    }


    public function delete_specification($id)
    {
        try {
            Product_Specifications::where(['id'=>$id])->delete();
            toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Silindi');
        }
        catch (QueryException $exception)
        {
            toastr()->error('Əməliyyat  Yerinə Yetirilmədi', 'Səhv Baş Verdi');
        }
        return redirect()->back();
    }

    public function store_specification(Request $request,$id)
    {
        for ($i=0; $i<count($request->spec_name);$i++)
        {
            $prod_spec = new Product_Specifications();
            $prod_spec->product_id = $id;
            $prod_spec->key = $request->spec_name[$i];
            $prod_spec->value = $request->spec_title[$i];
            $prod_spec->save();
        }
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Əlavə Edildi');
        return redirect()->back();
     }

    public function edit_specification($id)
    {
        $data = Product_Specifications::where(['product_id'=>$id])->get();
        return view('admin.product.edit_specification')->with(compact('id','data'));
    }

    public function update_specification(Request $request)
    {
        for ($i=0; $i<count($request->id);$i++)
        {
            Product_Specifications::where(['id'=>$request->id[$i]])->update
            ([
                'key'=>$request->spec_name[$i],
                'value'=>$request->spec_title[$i],
            ]);
        }
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Əlavə Edildi');
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->getAllCategory();
        return view('admin.product.product_create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('images')){
            foreach($request->file('images') as $file)
            {
               $imageName = Str::slug($request->title).'-'.Str::uuid().'.'.$file->getClientOriginalExtension();
               $file->move(public_path('/images/product/'),$imageName);
               $filenames[] = '/images/product/'.$imageName;
            }

            $data['images'] = json_encode($filenames);

        }
        $this->service->create($data) ;
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Əlavə Edildi');
        return redirect()->route('content.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $product = $this->service->getById($id);
        $categories = $this->service->getAllCategory();
        $images = json_decode($product->images);
      //  $cat_id = ProductCatToContent::where('product_content_id ', $id)->pluck('product_category_id ');
        return view('admin.product.product_update', compact('product', 'categories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductContentRequest $request, $id)
    {
        $p = $this->service->getById($id);
        $data = $request->all();
        if($request->hasFile('images')){
            foreach($request->file('images') as $file)
            {
               $imageName = Str::slug($request->title).'-'.Str::uuid().'.'.$file->getClientOriginalExtension();
               $file->move(public_path('/images/product/'),$imageName);
               $filenames[] = '/images/product/'.$imageName;
            }

            $data['images'] = json_encode($filenames);

            $images = json_decode($p->images);
            foreach($images as $file)
            {
                if(File::exists(public_path($file)))
                {
                unlink(public_path($file));
                }
            }
        }

        $this->service->update($data, $id);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Redaktə Edildi');
        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->getById($id)->delete();
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Zibil Qutusuna Atıldı');
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $data = $this->service->getById($request->id);
        $data->status = $request->status=="true" ? 1:0;
        return $data->save();
    }

    public function trashedIndex()
    {
        $data = $this->service->getTrashed();
        return view('admin.product.product_trashed')->with('data', $data);
    }

    public function hardDelete($id)
    {
        $this->service->hardDelete($id);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Silindi');
        return redirect()->back();
    }

    public function recover($id)
    {
        $this->service->recover($id);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Zibil Qutusundan Geri Qaytarıldı');
        return redirect()->back();
    }

}
