<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository implements BlogInterface
{
    protected $model;

    public function __construct(Blog $category)
    {
        $this->model = $category;
    }

    public function getAll($lang, $orderBy, $sortBy)
    {
        return $this->model->where('lang', $lang)->orderBy($orderBy, $sortBy)->get();
    }

    public function getPaginate($lang, $count, $orderBy, $sortBy)
    {
        return $this->model->where('lang', $lang)->where('category', 0)->orderBy($orderBy, $sortBy)->paginate($count);
    }

    public function getTake($lang, $count, $orderBy, $sortBy)
    {
        return $this->model->where('lang', $lang)->where('category', 0)->orderBy($orderBy, $sortBy)->take($count)->get();
    }


    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function slugCount($slug)
    {
        return $this->model->where('slug', $slug)->count();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $update = $this->model->find($id);
        return $update->fill($data)->save();
    }



}