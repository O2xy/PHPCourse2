<?php


namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
    public $id;
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function create()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key, ['db', 'tableName', 'id'])){
                continue;
            }
            $params[":{$key}"] = $value;
            $columns[] = "{$key}";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
        return $this->id;
    }

    public function getAll()
    {

        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql, [], get_called_class());
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id], get_called_class());
    }

    public function update()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key, ['db', 'tableName'])){
                continue;
            }
            $params[":{$key}"] = $value;
            if ($key!=='id') {
                $columns[] = "{$key}=:{$key}";
            }
        }

        $columns = implode(', ', $columns);
        $sql = "UPDATE {$tableName} SET {$columns} WHERE id = :id";
        return $this->db->execute($sql, $params);

    }

    public  function delete()
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql,[':id' => $this->id]);
    }

    abstract public function getTableName() : string;
}