<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Request;

class GetProductsRequest extends Request
{
    protected ?int $colorId;
    protected ?int $sizeId;
    protected ?int $categoryId;
    protected ?string $categorySlug;

    public function __construct(
        ?int $colorId,
        ?int $sizeId,
        ?int $categoryId,
        ?string $categorySlug
    ) {
        $this->colorId = $colorId;
        $this->sizeId = $sizeId;
        $this->categoryId = $categoryId;
        $this->categorySlug = $categorySlug;
    }

    public function getColorId(): ?int
    {
        return $this->colorId;
    }

    public function getSizeId(): ?int
    {
        return $this->sizeId;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function getCategorySlug(): ?string
    {
        return $this->categorySlug;
    }


}
