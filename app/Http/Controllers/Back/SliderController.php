<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use File;

class SliderController extends Controller
{
    protected $model;

    public function __construct(Slider $partner)
    {
        $this->model = $partner;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->orderBy('sort', 'ASC')->paginate(10);
        return view('admin.slider.index')->with('data', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $imageName = date('ymdis').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/slider/'),$imageName);
            $data['image'] = '/images/slider/'.$imageName;
        }
        $this->model->create($data);
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
        return response()->json($this->model->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $unl_img = $this->model->find($id);
            if(File::exists(public_path($unl_img->image)))
            {
                unlink(public_path($unl_img->image));
            }
            $imageName = date('ymdis').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/slider/'),$imageName);
            $data['image'] = '/images/slider/'.$imageName;
        }
        $update = $this->model->find($id);
        $update->fill($data)->save();
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
        $data = $this->model->find($id);
        if(File::exists(public_path($data->image)))
        {
            unlink(public_path($data->image));
        }
        $data->delete(); 
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Slider Silindi');
        return redirect()->back();

    }

    public function status(Request $request)
    {
        $data = $this->model->findOrFail($request->id);
        $data->status = $request->status=="true" ? 1:0;
        return $data->save();
    }
}
