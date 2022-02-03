<?php

namespace ErtugrulDege\ProductFeederSystem\Models;

use ErtugrulDege\ProductFeederSystem\Contracts\Arrayable;

class Product implements Arrayable
{
    private $id;
    private $name;
    private $price;
    private $category;

    public function __construct(int $id, string $name, int $price, string $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'category' => $this->getCategory(),
        ];
    }
}
