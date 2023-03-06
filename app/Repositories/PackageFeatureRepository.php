<?php

namespace App\Repositories;

use App\Models\PackageFeature;

class PackageFeatureRepository implements PackageFeatureInterface 
{

    protected $model;

    public function __construct(PackageFeature $model)
    {
        $this->model = $model;
    }

    public function getAll($lang, $orderBy, $sortBy)
    {
        return $this->model->where('lang', $lang)->orderBy($orderBy, $sortBy)->get();
    }

    public function getWhereIdAll($id, $lang, $orderBy, $sortBy)
    {
        return $this->model->where('package_id', $id)->where('lang', $lang)->orderBy($orderBy, $sortBy)->get();
    }

    public function getPaginate($count, $orderBy, $sortBy)
    {
        return $this->model->orderBy($orderBy, $sortBy)->paginate($count);
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