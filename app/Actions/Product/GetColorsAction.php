<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Action;
use App\Actions\Request;
use App\Models\Product\Color;
use Illuminate\Database\Eloquent\Collection;

final class GetColorsAction extends Action
{
    private Color $model;

    public function __construct(Color $model)
    {
        $this->model = $model;
    }

    public function execute(Request $request): Collection
    {
        return $this->model->all();
    }
}
