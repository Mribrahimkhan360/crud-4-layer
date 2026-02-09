<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'sku',
      'category',
      'brand',
      'price',
      'discount_price',
        'stock',
        'image',
        'status',
        'featured',
        'short_description',
        'description'
    ];
}
