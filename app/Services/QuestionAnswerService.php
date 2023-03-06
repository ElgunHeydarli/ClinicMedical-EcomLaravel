<?php

namespace App\Services;

use App\Repositories\QuestionAnswerRepository;
use App;
use Illuminate\Support\Str;
use File;

class QuestionAnswerService 
{
    protected $repository;

    public function __construct(QuestionAnswerRepository $repository)
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

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create($request)
    {
        $data = $request->all();
        
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

    public function update($id, $request)
    {
        $data = $request->all();


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

        return $this->repository->update($id, $data);
    }

}