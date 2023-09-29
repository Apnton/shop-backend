<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\EmptyRequest;
use App\Http\Controllers\Controller;
use App\Actions\Product\GetProductsAction;
use App\Actions\Product\GetProductsRequest;
use App\Actions\Product\GetProductBySlugAction;
use App\Actions\Product\GetProductBySlugRequest;
use App\Http\Presenters\Product\SearchPresenter;
use App\Http\Presenters\Product\ProductPresenter;
use App\Http\Requests\Product\ProductsValidationRequest;

class ProductController extends Controller
{
    public function index(
        GetProductsAction $action,
        ProductPresenter $presenter,
        ProductsValidationRequest $request
    ) {
        $result = $action->execute(
            new GetProductsRequest(
                $request->input('color_id'),
                $request->input('size_id'),
                $request->input('category_id'),
                $request->input('category_slug'),
            )
        );

        return $this->successResponse($presenter->paginate($result));
    }

    public function getBySlug(
        string $slug,
        SearchPresenter $presenter,
        GetProductBySlugAction $action
    ) {
        $result = $action->execute(
            new GetProductBySlugRequest($slug)
        );

        return $this->successResponse($presenter->present($result));
    }
}
