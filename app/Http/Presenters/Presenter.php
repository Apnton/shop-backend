<?php

namespace App\Http\Presenters;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Presenter
{
    /**
     * Present model
     *
     * @param  Model  $model
     *
     * @return array
     */

    abstract public function present(Model $model, ?array $fields): array;

    /**
     * Present collection model
     *
     * @param  Collection  $collection
     *
     * @return array
     */
    public function presentCollection(Collection $collection, ?array $fields = null): array
    {
        return $collection->map(function (Model $model) use ($fields) {
                    return $this->present($model, $fields);
                }
            )
            ->all();
    }

    public function paginate(LengthAwarePaginator $paginator, ?array $fields = null): array
    {
        return [
            'items'      => $this->presentCollection(collect($paginator->items()), $fields),
            'pagination' => [
                'from'    => $paginator->firstItem(),
                'to'      => $paginator->lastItem(),
                'current' => $paginator->currentPage(),
                'last'    => $paginator->lastPage(),
                'total'   => $paginator->total(),
                'limit'   => $paginator->perPage(),
            ],
        ];
    }
}
