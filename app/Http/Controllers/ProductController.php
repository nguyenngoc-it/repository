<?php

namespace App\Http\Controllers;

use App\Service\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function showProducts()
    {
        $products = $this->productService->getAll();
        return view('home', compact('products'));
    }

    public function create()
    {
        return view('createProduct');
    }

    public function store(Request $request)
    {
        $product= $this->productService->create($request );
        return redirect()->route('product.index');
    }

}
