<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable
        = [
            'title',
            'image',
            'created_at',
            'updated_at',
        ];

    protected $casts
        = [
            'title'      => 'string',
            'image'      => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',

        ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}
