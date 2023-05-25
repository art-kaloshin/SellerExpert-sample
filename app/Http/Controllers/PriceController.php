<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Http\Resources\PriceResourceCollection;
use App\Models\Price;
use App\Models\Product;

class PriceController extends Controller
{
    public function getAllPrices(): PriceResourceCollection
    {
        return PriceResourceCollection::make(Price::all());
    }

    /**
     * @throws \Exception
     */
    public function updatePrices(string $product_guid, PriceRequest $request): array
    {
        if (Product::where('guid', $product_guid)->doesntExist()) {
            throw new \Exception(Product::PRODUCT_NOT_FOUND);
        }

        Price::where('product_guid', $product_guid)->update(['status' => Price::DISABLED]);

        return [
            'status' => Price::query()->upsert(
                array_map(function ($priceItem) use ($product_guid) {
                    $priceItem['product_guid'] = $product_guid;
                    $priceItem['status'] = Price::ACTIVE;

                    return $priceItem;
                }, $request->validated('prices')),
                'guid'
            ) > 0
        ];
    }
}
