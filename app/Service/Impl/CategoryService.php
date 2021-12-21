<?php

namespace App\Service\Impl;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use App\Service\CategoryServiceInterface;
use Illuminate\Http\Client\Request;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function create($data)
    {
        $category= new Category();
        $category->name= $data['name'];
        $category= $this->categoryRepository->create($category);
    }
    public function delete($id)
    {
        $category= $this->categoryRepository->delete($id);
    }

    public function update($data, $id)
    {
        $category=Category::findOrFail($id);
        $category->name= $data['name'];
        $this->categoryRepository->update($category);


    }
}
