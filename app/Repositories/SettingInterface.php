<?php
namespace App\Repositories;

interface SettingInterface
{
    public function getById($id);

    public function update(array $data, $id);

}