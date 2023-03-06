<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PackageFeatureRequest;
use App\Services\PackageFeatureService;
use App\Services\PackageContentService;

class PackageFeatureController extends Controller
{
    protected $service;

    public function __construct(PackageFeatureService $service)
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
        $features = $this->service->getWhereIdAll();
        return view('admin.packages.content_index')->with('features', $features);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageFeatureRequest $request)
    {
        $data = $request->all();
        $this->service->create($data);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Əlavə Edildi');
        return redirect()->back();
    }

    public function show($id, PackageContentService $content_service)
    {
        $content = $content_service->getById($id);
        $features =  $this->service->getWhereIdAll($id);
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
    public function update(PackageFeatureRequest $request, $id)
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


}
