<?php

namespace app\models;

//use services\Db;

class Product extends Model
{
    public $name;
    public $description;
    public $price;
    public $category_id;

    public function getTableName(): string
    {
        return 'products';
    }


}