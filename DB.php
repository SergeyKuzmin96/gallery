<?php
require_once 'TSingletone.php';
class DB
{
    use TSingletone;
    private $connection;

    public function __construct()
    {
        $db = require_once  'config/config_db.php';
        $this->connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
        if(! $this->connection){
            throw new \Exception("Нет соединения с БД", 500);
        }
    }

    public function getConnection(){
        return $this->connection;
}

//public $connect;
//    private function __construct()
//    {
//        $db = require_once  'config/config_db.php';
//
//        $this->connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
//
//        if(! $this->connect){
//            throw new \Exception("Нет соединения с БД", 500);
//        }
//    }
//
//    public function getConnection(){
//        return $this->connect;
//    }
}