<?php

namespace App\Http\Controllers\Api\Product;
use App\Actions\EmptyRequest;
use App\Http\Controllers\Controller;
use App\Actions\Product\GetSizesAction;
use App\Http\Presenters\Product\SizePresenter;

class SizeController extends Controller
{
    public function index(
        GetSizesAction $action,
        SizePresenter $presenter
    )
    {
        $result = $action->execute(
            new EmptyRequest()
        );

        return $this->successResponse($presenter->presentCollection($result));
    }
}
