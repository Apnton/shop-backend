<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable
        = [
            'product_id',
            'path',
            'created_at',
            'updated_at',
        ];

    protected $casts
        = [
            'id'         => 'integer',
            'product_id' => 'integer',
            'path'       => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',

        ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getPath(): string
    {
        return $this->path;
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
