<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryCost\DeliveryCost;

class DeliveryController extends Controller
{
    public function index()
    {
        $delivery1 = new DeliveryCost();
        var_dump($delivery1->setWeight(5.3)->setSize([50, 10, 10])->setMinCost(120)->execute());

        echo '<br>';

        $delivery2 = new DeliveryCost();
        var_dump($delivery2->setWeight(1)->setSize([105, 7, 5])->setMinCost(120)->execute());

        echo '<br>';

        $delivery3 = new DeliveryCost();
        var_dump($delivery3->setWeight(0.5)->setSize([21.0, 29.7, 0.1])->setMinCost(120)->execute());
    }
}
