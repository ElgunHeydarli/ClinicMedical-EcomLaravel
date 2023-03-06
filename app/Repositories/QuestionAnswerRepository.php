<?php

namespace App\Repositories;
use App\Models\QuestionAnswer;

class QuestionAnswerRepository implements QuestionAnswerInterface 
{

    protected $model;

    public function __construct(QuestionAnswer $model)
    {
        $this->model = $model;
    }

    public function getAll($lang, $orderBy, $sortBy)
    {
        return $this->model->where('lang', $lang)->orderBy($orderBy, $sortBy)->get();
    }

    public function getById($id)
    {
        return $this->model->find($id);
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