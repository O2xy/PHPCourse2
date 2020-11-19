<?php


namespace app\models;


class Rewiew extends Model
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

}