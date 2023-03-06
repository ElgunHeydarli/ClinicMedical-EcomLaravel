<?php
namespace App\Repositories;

interface ServiceInterface{

    public function getAll($lang, $orderBy, $sortBy);

    public function getPaginate($count, $orderBy, $sortBy);

    public function getById($id);

    public function countSlug($slug);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function status($id, $status);

}