<?php

namespace models;

//use services\Db;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $categoryId;

    public function getTableName(): string
    {
        return 'products';
    }


}