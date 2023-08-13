<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Search extends Model
{
    protected $fillable = ['products', 'group'];

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getGroup(): Collection
    {
        return $this->product;
    }

    public function setGroup(Collection $group): self
    {
        $this->group = $group;

        return $this;
    }


}


