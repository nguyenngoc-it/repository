<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($data);

    public function delete($id);

    public function update($object);
}
