<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Action;
use App\Actions\Request;
use App\Models\Product\Group;
use App\Models\Product\Product;
use App\Models\Product\Search;

final class GetProductBySlugAction extends Action
{
    private Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function execute(Request $request): Search
    {
        $product = $this->model->with(['color', 'sizes'])->first();

        $group = $this->model->with(['color', 'sizes'])
            ->where('group_id', $product->getGroupId())
            ->get();

      return (new Search())->setProduct($product)->setGroup($group);

    }
}
