<?php


namespace app\models;


class Order_detail
{
    public $product_ids;

    public function getTableName() : string
    {
        return 'order_details';
    }
}