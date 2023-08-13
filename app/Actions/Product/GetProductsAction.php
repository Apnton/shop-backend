<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Action;
use App\Actions\Request;
use App\Models\Product\Product;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetProductsAction extends Action
{
    private Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /*
     * TODO
     * change size scope
     */

    public function execute(Request $request): LengthAwarePaginator
    {
        return $this->model->with(['category', 'sizes', 'color'])
            ->color($request->getColorId())
            ->category($request->getCategoryId())
            ->size($request->getSizeId())
            ->paginate(8);
    }


}
