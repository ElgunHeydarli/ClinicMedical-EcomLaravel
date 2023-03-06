<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use File;

class CommentController extends Controller
{
    protected $service;

    public function __construct(CommentService $service)
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
        $data = $this->service->getAll('sort','ASC');
        return view('admin.comment.index')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $this->service->create($request);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetrildi', 'Əlavə Edildi' );
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
    public function update(CommentRequest $request, $id)
    {
        $this->service->update($id, $request);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetrildi', 'Redaktə Edildi' );
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
        $data = $this->service->getById($id);
        $this->service->getById($id)->delete();
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Silindi');
        return redirect()->back(); 
    }

    public function status(Request $request)
    {
        $data = $this->service->getById($request->id);
        $data->status = $request->status=="true" ? 1:0;
        return $data->save();
    }

}
