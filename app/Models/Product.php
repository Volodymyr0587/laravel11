<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'body', 'status'
    ];

    protected function casts()
    {
        return [
            'status' => ProductStatus::class,
        ];
    }
}
