<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable
        = [
            'title',
            'category_id',
            'description',
            'content',
            'price',
            'preview',
            'is_published',
            'created_at',
            'updated_at',
        ];

    protected $casts
        = [
            'id'           => 'integer',
            'title'        => 'string',
            'category_id'  => 'integer',
            'description'  => 'string',
            'content'      => 'string',
            'price'        => 'integer',
            'preview'      => 'string',
            'is_published' => 'integer',
            'created_at'   => 'datetime',
            'updated_at'   => 'datetime',

        ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPreview(): ?string
    {
        return $this->preview;
    }

    public function getIsPublished(): int
    {
        return $this->is_published;
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
