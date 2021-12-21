<?php

namespace App\Service\Impl;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Service\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findById($id)
    {
        return $this->productRepository->find($id);
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function create($dataNewProduct)
    {
//        dd($dataNewProduct->file('image'));
        $path = $dataNewProduct->file('image')->store('images', 'public');
//        dd($path);
        $product = new Product();
        $product->name = $dataNewProduct->name;
        $product->price = $dataNewProduct->price;
        $product->image = $path;
        $product->category_id = $dataNewProduct->categoryId;
        $product->describes = $dataNewProduct->describes;
        $product->status = $dataNewProduct->status;
        $product = $this->productRepository->create($product);


    }

    public function update($object, $id)
    {

    }
}
