<?php

namespace App\Http\Presenters\Product;

use App\Http\Presenters\Presenter;
use Illuminate\Database\Eloquent\Model;

class ProductPresenter extends Presenter
{
    protected CategoryPresenter $categoryPresenter;
    protected SizePresenter $sizePresenter;
    protected ColorPresenter $colorPresenter;
    protected ImagePresenter $imagePresenter;

    public function __construct(
        CategoryPresenter $categoryPresenter,
        SizePresenter $sizePresenter,
        ColorPresenter $colorPresenter,
        ImagePresenter $imagePresenter
    ) {
        $this->categoryPresenter = $categoryPresenter;
        $this->sizePresenter = $sizePresenter;
        $this->colorPresenter = $colorPresenter;
        $this->imagePresenter = $imagePresenter;
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
            'thumbnails'  => $model->getThumbnails(),
            'slug'        => $model->getSlug(),
            'category'    => $this->categoryPresenter->present($model->category),
            'color'       => $this->colorPresenter->present($model->color),
            'sizes'       => $this->sizePresenter->presentCollection($model->sizes),
            'images'      => $this->imagePresenter->presentCollection($model->images),
        ];

        return $result;
    }
}
