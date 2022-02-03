<?php

namespace ErtugrulDege\ProductFeederSystem\Services;

use ErtugrulDege\ProductFeederSystem\Models\Product;
use ErtugrulDege\ProductFeederSystem\Contracts\ProductFeederInterface;

class FacebookXMLProductFeeder implements ProductFeederInterface {

    public function feed(): string
    {
        $file = file_get_contents(__DIR__ . '/../../public/products.json');
        $rawItems = json_decode($file,true);
        $items = [];

        // process product
        foreach ($rawItems as $rawItem) {
            $items[] = new Product(
                $rawItem['id'],
                $rawItem['name'], 
                $rawItem['price'],
                $rawItem['category']
            );
        }

        return $this
            ->arrayToXml(new \SimpleXMLElement('<Products/>'),$this->dataTransform($items))
            ->asXML();
        
    }

    private function dataTransform($data){
        foreach ($data as $item){
            $items[] = [
                'product_id' => $item->getId(),
                'product_name' => $item->getName(),
                'product_price' => $item->getPrice(),
                'product_category_name' => $item->getCategory(),
            ];
        }

        return $items;
    }

    private function arrayToXml(\SimpleXMLElement $xml, array $data)
    {
        foreach ($data as $key => $val){
            if (is_array($val)){
                $newObject = $xml->addChild('Product');
                $this->arrayToXml($newObject, $val);
            }else{
                ($key != 0 && $key == (int) $key) ?? $xml->addChild($key, $val);
                $xml->addChild($key, $val);
            }
        }
        return $xml;
    }
}