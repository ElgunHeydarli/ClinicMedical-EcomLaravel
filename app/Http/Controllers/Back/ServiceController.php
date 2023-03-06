<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Services\ServiceService;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->getAll();
        return view('admin.service.index')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('content_image_1')) {
            $imageName1 = Str::slug($request->title).'-1-'.time().'.'.$request->content_image_1->getClientOriginalExtension();
            $request->content_image_1->move(public_path('images/service'),$imageName1);
            $data['content_image_1'] = '/images/service/'.$imageName1;
        } 
        if($request->hasFile('content_image_2')) {
            $imageName1 = Str::slug($request->title).'-2-'.time().'.'.$request->content_image_2->getClientOriginalExtension();
            $request->content_image_2->move(public_path('images/service'),$imageName1);
            $data['content_image_2'] = '/images/service/'.$imageName1;
        } 
        $this->service->create($data);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Əlavə Edildi');
        return redirect()->back();
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
    public function update(ServiceRequest $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('content_image_1')) {
            $imageName1 = Str::slug($request->title).'-1-'.time().'.'.$request->content_image_1->getClientOriginalExtension();
            $request->content_image_1->move(public_path('images/service'),$imageName1);
            $data['content_image_1'] = '/images/service/'.$imageName1;
        } 
        if($request->hasFile('content_image_2')) {
            $imageName1 = Str::slug($request->title).'-2-'.time().'.'.$request->content_image_2->getClientOriginalExtension();
            $request->content_image_2->move(public_path('images/service'),$imageName1);
            $data['content_image_2'] = '/images/service/'.$imageName1;
        } 
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
