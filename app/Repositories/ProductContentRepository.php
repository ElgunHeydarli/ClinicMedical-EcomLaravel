<?php

namespace App\Repositories;

use App\Models\ProductContent;
use App\Models\ProductCategory;
use File;

class ProductContentRepository implements ProductContentInterface
{
    protected $model;

    public function __construct(ProductContent $model)
    {
        $this->model = $model;
    }

    public function getAll($lang, $orderBy, $sortBy)
    {
        return $this->model->with('getCategory')->where('lang', $lang)->orderBy($orderBy, $sortBy)->get();
    }

    public function getPaginate($lang, $count, $orderBy, $sortBy)
    {
        return $this->model->with('getCategory')->where('lang', $lang)->orderBy($orderBy, $sortBy)->paginate($count);
    }

    public function takeData($lang, $count, $orderBy, $sortBy)
    {
        return $this->model->with('getCategory')->where('lang', $lang)->orderBy($orderBy, $sortBy)->take($count)->get();
    }
    
    public function getAllCategory($lang, $orderBy, $sortBy)
    {
        return ProductCategory::where('lang',$lang)->orderBy($orderBy, $sortBy)->get();
    }
    
    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->get();
    }

    public function create(array $data)
    {
        $categories = $data['categories'];
        $data = $this->model->create($data);
        $data->getCategory()->attach($categories);
        return $data;
    }

    public function update(array $data, $id)
    {
        $categories = $data['categories'];
        $update = $this->model->find($id);



        $update->fill($data)->save();
        $update->getCategory()->sync($categories);
        return $update;
    }

    public function getTrashed()
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
    }

    public function getTrashedById($id)
    {
        return $this->model->onlyTrashed()->find($id);
    }

    public function hardDelete($id)
    {
        return $this->model->onlyTrashed()->find($id)->forceDelete();
    }

    public function recover($id)
    {
        return $this->model->onlyTrashed()->find($id)->restore();
    }


}