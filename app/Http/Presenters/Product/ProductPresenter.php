<?php

namespace App\Http\Presenters\Product;

use App\Http\Presenters\Presenter;
use Illuminate\Database\Eloquent\Model;

class ProductPresenter extends Presenter
{
    protected CategoryPresenter $categoryPresenter;

    public function __construct(
        CategoryPresenter $categoryPresenter
    ) {
        $this->categoryPresenter = $categoryPresenter;
    }

    public function present(Model $model, ?array $fields = []): array
    {
        (array)$result = [
            'id'          => $model->getId(),
            'title'       => $model->getTitle(),
            'category_id' => $model->getCategoryId(),
            'description' => $model->getDescription(),
            'content'     => $model->getContent(),
            'price'       => $model->getPrice(),
            'preview'     => $model->getPreview(),
            'category'    => $this->categoryPresenter->present($model->category),
        ];

        return $result;
    }
}
