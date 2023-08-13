<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\EmptyRequest;
use App\Http\Controllers\Controller;
use App\Actions\Product\GetColorsAction;
use App\Http\Presenters\Product\ColorPresenter;

class ColorController extends Controller
{
    public function index(
        GetColorsAction $action,
        ColorPresenter $presenter
    ) {
        $result = $action->execute(
            new EmptyRequest()
        );
        
        return $this->successResponse($presenter->presentCollection($result));
    }
}
