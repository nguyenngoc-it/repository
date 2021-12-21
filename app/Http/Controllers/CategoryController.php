<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Service\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('category', compact('categories'));
    }

    public function create()
    {
        return view('createcategory');
    }

    public function store(Request $request)
    {
        $category= $this->categoryService->create($request->all());
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category= $this->categoryService->delete($id);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category= Category::findOrFail($id);
        return view('categoryUpdate',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category= $this->categoryService->update($request->all(), $id);
        return redirect()->route('category.index');
    }
}
