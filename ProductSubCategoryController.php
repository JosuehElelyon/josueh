<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Product\ProductSubCategoryValidate;
use App\Interfaces\Product\ProductSubCategoryServiceInterface;

class ProductSubCategoryController extends BaseController
{


    /**
     * @var ProductSubCategoryServiceInterface
     */
    private $productSubCategoryService;

    public function __construct(ProductSubCategoryServiceInterface $productSubCategoryService)
    {
        $this->productSubCategoryService = $productSubCategoryService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(ProductSubCategoryValidate $request)
    {
        try {
            $data = $this->productSubCategoryService->createProductSubCategory($request->all());
            return $this->getResponseJson($data, 'sucess', '', [], Response::HTTP_CREATED);
        } catch (ValidationException $validationException) {
            return $this->getResponseJson([], 'error', $validationException->getMessage(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->getResponseJson([], 'error', $exception->getMessage(), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @OA\Get(
     * path="/company",
     * summary="List of zip codes by city",
     * description="Get list of zip codes by city",
     *     @OA\Response(
     *    response=200,
     *    description="Success"
     *     )
     * )
     * @param Request $request
     * @return JsonResponse
     */

    public function index(Request $request)
    {
        try {
            $data = $this->productSubCategoryService->showProductSubCategory($request->all());
            return $this->getResponseJson($data, 'sucess', '', [], Response::HTTP_OK);
        } catch (ValidationException $validationException) {
            return $this->getResponseJson([], 'error', $validationException->getMessage(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->getResponseJson([], 'error', $exception->getMessage(), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductSubCategoryValidate $request, $prefix, int $id)
    {
        try {
            $data = $this->productSubCategoryService->editProductSubCategory($request->all(), $id);
            if ($data){
                return $this->getResponseJson([], 'sucess', '', [], Response::HTTP_OK);
            }
            return $this->getResponseJson([], 'error', 'Update Error', [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (ValidationException $validationException) {
            return $this->getResponseJson([], 'error', $validationException->getMessage(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->getResponseJson([], 'error', $exception->getMessage(), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($prefix, int $id)
    {
        try {
            $data = $this->productSubCategoryService->deleteProductSubCategory($id);
            if ($data){
                return $this->getResponseJson([], 'sucess', '', [], Response::HTTP_OK);
            }
            return $this->getResponseJson([], 'error', 'Erro ao apagar usuário.', [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (ValidationException $validationException) {
            return $this->getResponseJson([], 'error', $validationException->getMessage(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $exception) {
            return $this->getResponseJson([], 'error', $exception->getMessage(), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}