<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\EmptyRequest;
use App\Http\Controllers\Controller;
use App\Actions\Product\GetCategoriesAction;
use App\Http\Presenters\Product\CategoryPresenter;

class CategoryController extends Controller
{
    public function index(
        GetCategoriesAction $action,
        CAtegoryPresenter $presenter
    ) {
        $result = $action->execute(
            new EmptyRequest()
        );
        
        return $this->successResponse($presenter->presentCollection($result));
    }
}
