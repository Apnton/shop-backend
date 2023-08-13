<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Action;
use App\Actions\Request;
use App\Models\Product\Size;
use Illuminate\Database\Eloquent\Collection;

final class GetSizesAction extends Action
{
    private Size $model;

    public function __construct(Size $model)
    {
        $this->model = $model;
    }

    public function execute(Request $request): Collection
    {
        return $this->model->all();
    }

}
