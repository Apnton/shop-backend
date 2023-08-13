<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Request;

class GetProductsRequest extends Request
{
    protected ?int $colorId;
    protected ?int $categoryId;
    protected ?int $sizeId;

    public function __construct(
        ?int $colorId,
        ?int $categoryId,
        ?int $sizeId
    ) {
        $this->colorId = $colorId;
        $this->categoryId = $categoryId;
        $this->sizeId = $sizeId;
    }

    public function getColorId(): ?int
    {
        return $this->colorId;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function getSizeId(): ?int
    {
        return $this->sizeId;
    }


}
