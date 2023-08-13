<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Color extends Model
{
    protected $table = 'colors';

    protected $fillable
        = [
            'title',
            'color',
            'created_at',
            'updated_at',
        ];

    protected $casts
        = [
            'id'         => 'integer',
            'title'      => 'string',
            'color'      => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',

        ];
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getColor(): string
    {
        return $this->color;
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
