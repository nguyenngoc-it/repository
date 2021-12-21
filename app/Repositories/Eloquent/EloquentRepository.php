<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->get();
    }

    public function create($data)
    {
        return $data->save();
    }

    public function delete($id)
    {
        return $this->model->destroy($id);

    }

    public function update($object)
    {
        return $object->save();
    }
}
