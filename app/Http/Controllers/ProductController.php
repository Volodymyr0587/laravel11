<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $input = [
            'name' => fake()->word,
            'body' => fake()->sentence(3),
            'status' => fake()->randomElement([
                ProductStatus::Active,
                ProductStatus::Inactive,
                ProductStatus::Pending,
                ProductStatus::Rejected
            ])
        ];

        $product = Product::create($input);

        dd($product->status, $product->status->value);
    }
}
