<?php

namespace App\Repositories;

use App\Models\PackageContent;

class PackageContentRepository implements PackageContentInterface 
{

    protected $model;

    public function __construct(PackageContent $model)
    {
        $this->model = $model;
    }

    public function getAll($lang, $orderBy, $sortBy)
    {
        return $this->model->with('getCategory')->where('lang', $lang)->orderBy($orderBy, $sortBy)->get();
    }

    public function getPaginate($count, $orderBy, $sortBy)
    {
        return $this->model->with('getCategory')->orderBy($orderBy, $sortBy)->paginate($count);
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
    
    public function countSlug($slug)
    {
        return $this->model->where('slug', $slug)->get();
    }

    public function create(array $data)
    {
        return  $this->model->create($data);;
    }

    public function update(array $data, $id)
    {
        $update = $this->model->find($id);
        $update->fill($data)->save();
        return $update;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();;
    }

    public function status($id, $status)
    {
        $data = $this->model->findOrFail($id);
        $data->status = $status=="true" ? 1:0;
        return $data->save();
    }

}