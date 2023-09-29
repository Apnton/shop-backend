<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Actions\Request;

class GetCategoryBySlugRequest extends Request
{
    protected string $slug;

    public function __construct(
        string $slug
    ) {
        $this->slug = $slug;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }


}
