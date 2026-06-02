<?php

namespace src;

use src\services\Db;
use src\services\Request;

abstract class Entity
{
    protected string $tableName = 'review';
    public ?int $id = null;
    protected ?Request $request = null;
    protected ?Db $db = null ;

    public function __construct(?Request $request = null, Db $db = null){
        $this->request = $request;
        $this->db = $db;
    }

    public function load($fields) {
        foreach($fields as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    public function insert(array $fields){
        $props = [];
        $values = [];
        foreach($fields as $key => $value){
            $props[] = $key;
            $values[] = $value;
        }
        $propViaSemicolon = implode(', ', $props);
        $valueViaSemicolon = implode('", "', $values);
        $sql = 'INSERT INTO ' . $this->tableName . '(' . $propViaSemicolon . ') VALUES ("' . $valueViaSemicolon . '")';
        return $this->db->querySql($sql);
    }

    public function findAll() : ?array{
        $sql = 'SELECT * FROM ' . $this->tableName;
        $result = $this->db->querySql($sql);
        if($result === false) return null;
        return $result;
    }

    public function getById(int $id): ?array {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE id = ' . $id;
        $result = $this->db->querySql($sql);

        if(empty($result)){
            return null;
        }
        return $result;
    }      
              
    public function findByColumn(string $columnName, $value, int $limit = 0): ?array {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $columnName . ' = "' . $value . '"';

        if ($limit > 0) {
            $sql = $sql . ' LIMIT ' . $limit;
        }

        $result = $this->db->querySql($sql);

        if (empty($result)) {
            return null;
        }
        return $result;
    }

    public function update(array $fields): bool {
        $sets = [];
        foreach($fields as $key => $value){
            $sets[] = "$key='$value'";
        }
        $setSting = implode(', ', $sets);
        $sql = 'UPDATE ' . $this->tableName . ' SET ' . $setSting . ' WHERE id =' . $this->id;
        return $this->db->querySql($sql);
    }

    public function delete(): bool {
        $sql = 'DELETE FROM ' . $this->tableName . ' WHERE id = ' . $this->id;
        return  $this->db->querySql($sql);  
    }
}