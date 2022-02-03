<?php

namespace ErtugrulDege\ProductFeederSystem\Services;

use ErtugrulDege\ProductFeederSystem\Models\Product;
use ErtugrulDege\ProductFeederSystem\Contracts\ProductFeederInterface;

class GoogleJSONProductFeeder implements ProductFeederInterface {

    public function feed(): string
    {
        $file = file_get_contents(__DIR__ . '/../../public/products.json');
        $rawItems = json_decode($file,true);
        $items = [];

        // process product
        foreach ($rawItems as $rawItem) {
            $items[] = (new Product(
                $rawItem['id'],
                $rawItem['name'], 
                $rawItem['price'],
                $rawItem['category']
            ))->toArray();
        }

        return json_encode($items);
    }
}