<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Http\Resources\PriceResourceCollection;
use App\Models\Price;

class PriceController extends Controller
{
    public function getAllPrices(): PriceResourceCollection
    {
        return PriceResourceCollection::make(Price::all());
    }

    public function updatePrices(string $product_guid, PriceRequest $request): array
    {
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
