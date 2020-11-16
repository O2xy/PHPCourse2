<?php


namespace models;


class Rewiews extends Model
{
    public $id;
    public $author;
    public $text;
    public $goodID;
    public $date;

    public function getTableName() : string
    {
        return 'reviews';
    }

    public function getDate()
    {
        $this->date = date("Y-m-d H:i:s");
    }
}