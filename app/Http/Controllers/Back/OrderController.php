<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use File;

class OrderController extends Controller
{
    protected $model;

    public function __construct(Order $partner)
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
        $data = $this->model->orderBy('id', 'DESC')->get();
        return view('admin.order.index')->with('data', $data);
    }

    public function show($id)
    {
        $data = $this->model->find($id);
        return view('admin.order.show')->with('data', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
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
