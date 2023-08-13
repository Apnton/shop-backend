<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Actions\Product\GetProductsAction;
use App\Actions\Product\GetProductBySlugAction;
use App\Actions\EmptyRequest;
use App\Http\Presenters\Product\ProductPresenter;
use App\Http\Presenters\Product\SearchPresenter;
use App\Http\Requests\Product\ProductsValidationRequest;
use App\Actions\Product\GetProductsRequest;

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
            )
        );

        return $this->successResponse($presenter->paginate($result));
    }

    public function show(
        GetProductBySlugAction $action,
        SearchPresenter $presenter
    )
    {
        $result = $action->execute(
            new EmptyRequest()
        );

        return $this->successResponse($presenter->present($result));
    }
}
