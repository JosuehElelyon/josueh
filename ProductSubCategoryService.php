<?php


namespace App\Service\Product;

use App\Models\Product\ProductSubCategory;
use App\Repository\Product\ProductSubCategoryRepository;
use App\Interfaces\Product\ProductSubCategoryServiceInterface;

class ProductSubCategoryService implements ProductSubCategoryServiceInterface
{

    /**
     * @var ProductSubCategoryRepository
     */
    private $productSubCategoryRepository;

    public function __construct()
    {
        $this->productSubCategoryRepository = new ProductSubCategoryRepository();
    }

    /**
     * @param array $data
     * @return ProductSubCategory
     */
    public function createProductSubCategory(array $data): ProductSubCategory
    {
       return $this->productSubCategoryRepository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function editProductSubCategory(array $data, int $id): bool
    {
        return  $this->productSubCategoryRepository->update($data, $id);
    }

    /**
     * @param array $filter
     * @return mixed
     */
    public function showProductSubCategory(array $filter)
    {
        return $this->productSubCategoryRepository->index($this->mountFilter($filter));
    }

    /**
     * @param array $parameters
     * @return array
     */
    private function mountFilter(array $parameters): array
    {
        $filter = [];
        if (isset($parameters['search']))
            array_push($filter, ['name', 'like', '%'.$parameters['search'].'%']);
        return $filter;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteProductSubCategory(int $id): bool
    {
        return $this->productSubCategoryRepository->destroy($id);
    }
}