<?php

namespace app\models;


class WeightGood extends AbstractGood
{
    public $weight;

    public function calculateCost()  {
        $this->cost = $this->price * $this->count * $this->weight;
    }
}