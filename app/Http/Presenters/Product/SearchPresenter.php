<?php

namespace App\Http\Presenters\Product;

use App\Http\Presenters\Presenter;
use Illuminate\Database\Eloquent\Model;

class SearchPresenter extends Presenter
{
    protected ProductPresenter $categoryPresenter;

    public function __construct(
        ProductPresenter $productPresenter,
    ) {
        $this->productPresenter = $productPresenter;
    }

    public function present(Model $model, ?array $fields = []): array
    {
        (array)$result = [
            'product' => $this->productPresenter->present($model->product),
            'group'    => $this->productPresenter->presentCollection($model->group),
        ];

        return $result;
    }
}
