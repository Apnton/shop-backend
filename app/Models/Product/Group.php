<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable
        = [
            'title',
            'created_at',
            'updated_at',
        ];

    protected $casts
        = [
            'id'         => 'integer',
            'title'      => 'string',
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

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

}
