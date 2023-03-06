<?php

namespace App\Repositories;

interface ProductContentInterface
{


    public function takeData($lang, $count, $orderBy, $sortBy);

    public function getPaginate($lang, $count, $orderBy, $sortBy);

    public function getAll($lang, $orderBy, $sortBy);

    public function getAllCategory($lang, $orderBy, $sortBy);

    public function getById($id);

    public function getBySlug($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function getTrashed();

    public function getTrashedById($id);

    public function hardDelete($id);

    public function recover($id);

}