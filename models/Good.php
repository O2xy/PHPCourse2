<?php


namespace app\models;


class Good extends AbstractGood
{
    public function calculateCost() {
        $this->cost = $this->price * $this->count;
    }
}