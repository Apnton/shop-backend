<?php

namespace App\Models\Product;

use App\Models\Product\Size;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable
        = [
            'title',
            'slug',
            'description',
            'content',
            'price',
            'quantity',
            'category_id',
            'color_id',
            'group_id',
            'thumbnails',
            'is_published',
            'created_at',
            'updated_at',
        ];

    protected $casts
        = [
            'id'           => 'integer',
            'title'        => 'string',
            'slug'         => 'string',
            'description'  => 'string',
            'content'      => 'string',
            'price'        => 'integer',
            'quantity'     => 'integer',
            'category_id'  => 'integer',
            'color_id'     => 'integer',
            'group_id'     => 'integer',
            'thumbnails'   => 'string',
            'is_published' => 'integer',
            'created_at'   => 'datetime',
            'updated_at'   => 'datetime',

        ];

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_size_pivot')->withPivot('quantity');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function scopeColor(Builder $query, ?int $color_id): Builder
    {
        return $color_id ? $query->whereRelation('color', 'id', $color_id) :  $query;
    }

    public function scopeCategory(Builder $query, ?int $category_id): Builder
    {
        return $category_id ? $query->whereRelation('category', 'id', $category_id) :  $query;
    }

    public function scopeCategoryBySlug(Builder $query, ?string $slug): Builder
    {
        return $slug ? $query->whereRelation('category', 'slug', $slug) :  $query;
    }

    public function scopeSize(Builder $query, ?int $size_id): Builder
    {
        return $size_id ? $query->whereRelation('sizes', 'id', $size_id) :  $query;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
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

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getColorId(): int
    {
        return $this->color_id;
    }

    public function getGroupId(): int
    {
        return $this->group_id;
    }

    public function getThumbnails(): ?string
    {
        return $this->thumbnails;
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
