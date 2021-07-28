<?php


namespace App\Interfaces\Product;

use App\Models\Product\ProductSubCategory;

interface ProductSubCategoryServiceInterface
{
    public function createProductSubCategory(array $data): ProductSubCategory;
    public function editProductSubCategory(array $data, int $id): bool;
    public function showProductSubCategory(array $filter);
    public function deleteProductSubCategory(int $id): bool;
}