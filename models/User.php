<?php


namespace app\models;


class User extends Model
{
    public $name;
    public $login;
    public $password;

    public function getTableName(): string
    {
        return 'users';
    }

}