<?php
namespace App\Repositories;

use App\Models\Setting;

class SettingRepository implements SettingInterface 
{

    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        $update = $this->model->find($id);
        return $update->fill($data)->save();
    }


}