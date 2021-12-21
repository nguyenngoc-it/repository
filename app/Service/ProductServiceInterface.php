<?php

namespace App\Service;

interface ProductServiceInterface
{
    public function findById($id);

    public function getAll();

    public function create($dataNewProduct);

    public function update($object, $id);
}
