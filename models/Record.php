<?php
namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Record implements ModelInterface
{
    /** @var Db|null  */
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = static::getTableName();
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return  static::getQuery($sql,[]);
    }

    /**
     * @param int $id
     * @return static
     */
    public static function getById(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return  static::getQuery($sql, [':id' => $id])[0];
    }

    public function delete()
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function insert()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
    }


    public function update()
    {

    }

    /**
     * @param $sql
     * @param array $params
     * @return static[]
     */
    protected static function getQuery($sql, $params = []) {
        return Db::getInstance()->queryAll($sql,$params, get_called_class());
    }
}