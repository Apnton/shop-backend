<?php

namespace App\Http\Presenters\Product;

use App\Http\Presenters\Presenter;
use Illuminate\Database\Eloquent\Model;

class ImagePresenter extends Presenter
{
    public function present(Model $model, ?array $fields = []): array
    {
        (array)$result = [
            'id'   => $model->getId(),
            'path' => $model->getPath(),
        ];

        return $result;
    }
}
