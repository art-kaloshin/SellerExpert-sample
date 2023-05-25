<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    const PRODUCT_AMOUNT = 10000;
    const PRICE_AMOUNT = 100;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(self::PRODUCT_AMOUNT)
            ->has(Price::factory(self::PRICE_AMOUNT))
            ->create();
    }
}
