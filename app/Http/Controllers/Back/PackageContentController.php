<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PackageContentRequest;
use App\Services\PackageContentService;
use App\Services\PackageCategoryService;
use App\Services\PackageFeatureService;

class PackageContentController extends Controller
{
    protected $service;

    public function __construct(PackageContentService $service)
    {
        $this->service = $service;
    }

    public function index(PackageCategoryService $category_service)
    {
        $contents = $this->service->getAll();
        $categories = $category_service->getAll();
        return view('admin.packages.content_index')->with('contents', $contents)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageContentRequest $request)
    {
        $data = $request->all();
        $this->service->create($data);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Əlavə Edildi');
        return redirect()->back();
    }

    public function show($id, PackageFeatureService $feature_service)
    {
        $content = $this->service->getById($id);
        $features = $feature_service->getWhereIdAll($id);
        return view('admin.packages.content_feature')->with('content', $content)->with('features', $features);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageContentRequest $request, $id)
    {
        $data = $request->all();

        $this->service->update($data, $id);
        
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Redaktə Edildi');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);    
        toastr()->error('Əməliyyat Uğurla Yerinə Yetirildi', 'Kateqoriya Silindi');
        return redirect()->back();
    }


    public function status(Request $request){
        return $this->service->status($request->id, $request->status);
    }
}
