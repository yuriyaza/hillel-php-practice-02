<?php

namespace App\DeliveryCost;

class DeliveryCost
{
    private const WEIGHT_PRICE = 50;
    private const SIZE_PRICE = 50;

    private $weight = 0;
    private $size = 0;
    private $minCost = 0;

    private function isInputDataCorrect($inputData)
    {
        if (!is_numeric($inputData)) {
            die("Введено некоректні дані");
        }
        return true;
    }

    public function setWeight($weight)
    {
        if ($this->isInputDataCorrect($weight)) {
            $this->weight = $weight;
        }
        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setSize($length, $width, $height)
    {
        if ($this->isInputDataCorrect($length) && $this->isInputDataCorrect($width) && $this->isInputDataCorrect($height)) {
            $this->size = [
                'length' => $length,
                'width' => $width,
                'height' => $height,
            ];
        }
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setMinCost($minCost = 0)
    {
        if ($this->isInputDataCorrect($minCost)) {
            $this->minCost = $minCost;
        }
        return $this;
    }

    public function getMinCost()
    {
        return $this->minCost;
    }

    public function execute()
    {
        $minCost = round($this->minCost, 2);
        $costByWeight = round($this->weight * $this::WEIGHT_PRICE, 2);
        $costBySize = round($this->size['length'] * $this->size['width'] * $this->size['height'] / 1000 * $this::SIZE_PRICE, 2);

        if ($costByWeight == 0 || $costBySize == 0) {
            die("Не задана вага або об'єм");
        }

        $result = ['title' => "Мінімальна вартість доставки, зазначена продавцем:", 'cost' => $minCost];

        if ($costByWeight > $result['cost']) {
            $result = ['title' => "Вартість доставки за вагою:", 'cost' => $costByWeight];
        }

        if ($costBySize > $result['cost']) {
            $result = ['title' => "Вартість доставки за об'ємною вагою:", 'cost' => $costBySize];
        }

        return $result;
    }
}
