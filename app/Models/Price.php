<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    public const ACTIVE = 1;
    public const DISABLED = 0;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'price_guid', 'guid');
    }
}
