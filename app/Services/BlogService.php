<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Support\Str;
use File;
use App;

class BlogService
{
    protected $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll($orderBy = 'id', $sortBy = 'DESC')
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


    public function getPaginate($count = 12, $orderBy = 'id', $sortBy = 'DESC')
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



    public function getTake($count = 12, $orderBy = 'id', $sortBy = 'DESC')
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
        return $this->repository->getTake($lang, $count, $orderBy, $sortBy);
    }
    
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    // Create Slug
    public function createSlug($data)
    {
        $slug = Str::slug($data);
        $countSlug = $this->repository->slugCount($slug);
        if($countSlug>0){
            $slug = $slug."-".date('ymdis');
        }
    }

    // Add Image
    public function addImage($data)
    {
        $imageName = $data['slug'].'.'.$data['img']->getClientOriginalExtension();
        $data['img']->move(public_path('/uploads/images/blog/'),$imageName);
        $data['img'] = '/uploads/images/blog/'.$imageName;
    }

    public function deleteImage($id)
    {
        $unl_img = $this->repository->getById($id);
        if(File::exists(public_path($unl_img->img)))
        {
           unlink(public_path($unl_img->img));
        }
    }

    public function create($request)
    {
        $data = $request->all();

        $slug = Str::slug($data['title']);
        $countSlug = $this->repository->slugCount($slug);
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

        if($request->hasFile('img')){
            $imageName = $slug.'.'.$data['img']->getClientOriginalExtension();
            $request->img->move(public_path('/uploads/images/blog/'),$imageName);
            $data['img'] = '/uploads/images/blog/'.$imageName;
        }

        return $this->repository->create($data);
    }

    public function update($id, $request)
    {
        $data = $request->all();

        $slug = Str::slug($data['title']);
        $countSlug = $this->repository->slugCount($slug);
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

        if($request->hasFile('img')){
            $imageName = $slug.'.'.$data['img']->getClientOriginalExtension();
            $request->img->move(public_path('/uploads/images/blog/'),$imageName);
            $data['img'] = '/uploads/images/blog/'.$imageName;
        }

        // Image
        if($request->hasFile('img')){
            $unl_img = $this->repository->getById($id);
            if(File::exists(public_path($unl_img->img)))
            {
               unlink(public_path($unl_img->img));
            }
        }
        // End Image

        return $this->repository->update($id, $data);
    }

}