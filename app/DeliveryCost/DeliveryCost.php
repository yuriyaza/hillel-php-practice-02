<?php

namespace App\DeliveryCost;

class DeliveryCost
{
    private const WEIGHT_PRICE = 50;
    private const SIZE_PRICE = 50;

    private $productWeight;
    private $productSize;
    private $minCost = 0;

    private $totalCostType;

    public function setWeight($productWeight)
    {
        $this->productWeight = $productWeight;
        return $this;
    }

    public function getWeight()
    {
        return $this->productWeight;
    }

    public function setSize($productSize)
    {
        $this->productSize = $productSize;
        return $this;
    }

    public function getSize()
    {
        return $this->productSize;
    }

    public function setMinCost($minCost = 0)
    {
        $this->minCost = $minCost;
        return $this;
    }

    public function getMinCost()
    {
        return $this->minCost;
    }

    public function getTotalCostType()
    {
        return $this->totalCostType;
    }

    public function execute(): float
    {
        $costByWeight = $this->productWeight * $this::WEIGHT_PRICE;
        $costBySize = $this->productSize[0] * $this->productSize[1] * $this->productSize[2] / 1000 * $this::SIZE_PRICE;

        $totalCost = $this->minCost;
        $totalCostType = "Мінімальна вартість доставки";

        if ($costByWeight > $totalCost) {
            $totalCost = $costByWeight;
            $totalCostType = "Вартість доставки за вагою";
        }

        if ($costBySize > $totalCost) {
            $totalCost = $costBySize;
            $totalCostType = "Вартість доставки за об'ємною вагою";
        }

        $this->totalCostType = $totalCostType;
        return $totalCost;
    }
}
