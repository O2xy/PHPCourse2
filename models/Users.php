<?php


namespace models;


class Users extends Model
{
    public $name;
    public $email;

    public function getTableName(): string
    {
        return 'users';
    }

}