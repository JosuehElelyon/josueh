<?php

namespace App\Repository\Product;

use App\Repository\AbstractRepository;
use App\Models\Product\ProductSubCategory;

class ProductSubCategoryRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new ProductSubCategory();
    }
}