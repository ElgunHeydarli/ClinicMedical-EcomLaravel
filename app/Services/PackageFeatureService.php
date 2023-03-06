<?php

namespace App\Services;

use App\Repositories\PackageFeatureRepository; 
use Illuminate\Support\Str;
use App;

class PackageFeatureService 
{
    protected $repository;

    public function __construct(PackageFeatureRepository $repository)
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

    public function getWhereIdAll($id, $orderBy = 'sort', $sortBy = 'ASC')
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

        return $this->repository->getWhereIdAll($id, $lang, $orderBy, $sortBy);
    }

    public function getPaginate($count = 10, $orderBy = 'id', $sortBy = 'DESC')
    {
        return $this->repository->getPaginate($count, $orderBy, $sortBy)->paginate($count);
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create(array $data)
    {

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

        return  $this->repository->create($data);
    }

    public function update(array $data, $id)
    {

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

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function status($id, $status)
    {
        return $this->repository->status($id, $status);
    }


}