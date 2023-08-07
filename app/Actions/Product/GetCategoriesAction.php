<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Action;
use App\Actions\Request;
use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Collection;

final class GetCategoriesAction extends Action
{
    private Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function execute(Request $request): Collection
    {
        return $this->model->all();
    }
}
