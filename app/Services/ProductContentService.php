<?php

namespace App\Services;

use App\Repositories\ProductContentRepository;
use Illuminate\Support\Str;
use File;
use App;

class ProductContentService 
{
    protected $repository;

    public function __construct(ProductContentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll($orderBy = 'sort', $sortBy = 'ASC')
    {
        if(App::isLocale('en')){
            $lang = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $lang = 2;
        }
        else{
            $lang = 0;
        }
        return $this->repository->getAll($lang, $orderBy, $sortBy);
    }

    public function getPaginate($count = 10, $orderBy = 'sort', $sortBy = 'ASC')
    {
        if(App::isLocale('en')){
            $lang = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $lang = 2;
        }
        else{
            $lang = 0;
        }
        return $this->repository->getPaginate($lang, $count, $orderBy, $sortBy);
    }

    public function takeData($count = 10, $orderBy = 'sort', $sortBy = 'ASC')
    {
        if(App::isLocale('en')){
            $lang = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $lang = 2;
        }
        else{
            $lang = 0;
        }
        return $this->repository->getPaginate($lang, $count, $orderBy, $sortBy);
    }

    public function getAllCategory($orderBy = 'sort', $sortBy = 'ASC')
    {
        if(App::isLocale('en')){
            $lang = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $lang = 2;
        }
        else{
            $lang = 0;
        }
        return $this->repository->getAllCategory($lang, $orderBy, $sortBy);
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function getBySlug($id)
    {
        return $this->repository->getBySlug($id);
    }

    public function create(array $data)
    {
        $slug = Str::slug($data['title']);
        $countSlug = $this->repository->getBySlug($slug)->count();
        if($countSlug>0){
            $slug = $slug."-".time();
        }
        $data['slug'] = $slug;

        if(App::isLocale('en')){
            $data['lang'] = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $data['lang'] = 2;
        }
        else{
            $data['lang'] = 0;
        }
        
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        $slug = Str::slug($data['title']);
        $countSlug = $this->repository->getBySlug($slug)->count();
        if($countSlug>0){
            $slug = $slug."-".date('ymdis');
        }
        $data['slug'] = $slug;
        
        if(App::isLocale('en')){
            $data['lang'] = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $data['lang'] = 2;
        }
        else{
            $data['lang'] = 0;
        }
        
        return $this->repository->update($data, $id);
    }

    public function getTrashed()
    {
        return $this->repository->getTrashed();
    }

    public function getTrashedById($id)
    {
        return $this->repository->getTrashedById($id);
    }

    public function hardDelete($id)
    {       
        $data = $this->repository->getTrashedById($id);

        $images = json_decode($data->images);
        foreach($images as $file)
        {        
            if(File::exists(public_path($file)))
            {
            unlink(public_path($file));
            }
        }

        return $this->repository->hardDelete($id);
    }

    public function recover($id)
    {
        return $this->repository->recover($id);
    }

}