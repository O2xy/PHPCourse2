<?php


namespace app\models;


class Order extends Model
{
    public $user_id;

    public function getTableName() : string
    {
        return 'orders';
    }
}