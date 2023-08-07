<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Actions\Product\GetProductsAction;
use App\Actions\EmptyRequest;
use App\Http\Presenters\Product\ProductPresenter;

class ProductController extends Controller
{
    public function index(
        GetProductsAction $action,
        ProductPresenter $presenter
    ) {
        $result = $action->execute(
            new EmptyRequest()
        );
        
        return $this->successResponse($presenter->paginate($result));
    }
}
