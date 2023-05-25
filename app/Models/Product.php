<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;

    const PRODUCT_NOT_FOUND = 'Product not found!';

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'product_guid', 'guid');
    }
}
