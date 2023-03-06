<?php 

namespace App\Repositories;

interface BlogInterface
{
    public function getAll($lang, $orderBy, $sortBy);

    public function getPaginate($lang, $count, $orderBy, $sortBy);

    public function getTake($lang, $count, $orderBy, $sortBy);

    public function getById($id);

    public function slugCount($slug);

    public function create(array $data);

    public function update($id, array $data);

} 