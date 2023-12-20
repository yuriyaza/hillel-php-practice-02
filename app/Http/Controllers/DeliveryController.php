<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryCost\DeliveryCost;

class DeliveryController extends Controller
{
    public function index()
    {
        $delivery1 = new DeliveryCost();
        $cost1 = $delivery1->setWeight(5.3)->setSize(50, 10, 10)->setMinCost(120)->execute();
        var_dump($cost1['title'], $cost1['cost']);

        echo '<br>';

        $delivery2 = new DeliveryCost();
        $cost2 = $delivery2->setWeight(1)->setSize(105, 7, 5)->setMinCost(120)->execute();
        var_dump($cost2['title'], $cost2['cost']);

        echo '<br>';

        $delivery3 = new DeliveryCost();
        $cost3 = $delivery3->setWeight(0.5)->setSize(21.0, 29.7, 0.1)->setMinCost(120)->execute();
        var_dump($cost3['title'], $cost3['cost']);
    }
}
