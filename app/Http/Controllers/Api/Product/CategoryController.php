<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\EmptyRequest;
use App\Http\Controllers\Controller;
use App\Actions\Product\GetCategoriesAction;
use App\Actions\Product\GetCategoryBySlugAction;
use App\Actions\Product\GetCategoryBySlugRequest;
use App\Http\Presenters\Product\CategoryPresenter;

class CategoryController extends Controller
{
    public function index(
        GetCategoriesAction $action,
        CategoryPresenter $presenter
    ) {
        $result = $action->execute(
            new EmptyRequest()
        );
        
        return $this->successResponse($presenter->presentCollection($result));
    }

    public function getBySlug(
        string $slug,
        CategoryPresenter $presenter,
        GetCategoryBySlugAction $action
    )
    {
        $result = $action->execute(
            new GetCategoryBySlugRequest($slug)
        );

        return $this->successResponse($presenter->present($result));
    }
}
