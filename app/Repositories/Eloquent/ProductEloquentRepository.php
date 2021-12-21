<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel(): string
    {
        return Product::class;
    }
}
