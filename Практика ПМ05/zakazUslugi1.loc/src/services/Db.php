<?php

namespace src\services;

use mysqli_result;
use src\exceptions\DbExceptions;

class Db extends \mysqli
{
    public function __construct($config)
    {
        try{
            parent::__construct($config['hostname'], $config['username'], $config['password'], $config['database']);
        }catch(\mysqli_sql_exception $e){
            throw new DbExceptions('Ошибка при подключении к базе данным: ' . $e->getMessage());
        }
    }
    public function querySql(string $sql, array $params = []): array|bool
    {
        $result = parent::query($sql);
        if(gettype($result) == 'boolean') return $result;
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}   