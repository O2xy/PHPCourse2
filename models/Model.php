<?php


namespace app\models;

use app\services\Db;

abstract class Model implements ModelInterface
{
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
//        return (new Db()) -> queryAll($sql);
        return $this ->db -> queryAll($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this ->db -> queryOne($sql, [':id' => $id]);
    }

    abstract public function getTableName() : string;
}