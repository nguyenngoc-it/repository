<?php

namespace App\Service;

use Illuminate\Http\Client\Request;

interface CategoryServiceInterface
{
    public function getAll();
    public function create($data);
    public function delete($id);
    public function update($data, $id);
}
