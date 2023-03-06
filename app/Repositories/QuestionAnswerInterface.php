<?php

namespace App\Repositories;


interface QuestionAnswerInterface
{

    public function getAll($lang, $orderBy, $sortBy);

    public function getById($id);

    public function create(array $data);

    public function update($id, array $data);

}
