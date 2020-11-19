<?php


namespace app\models;


class DigitalGood extends AbstractGood
{
    public function calculateCost() {
        $this->cost = $this->price * $this->count / 2;
    }
}