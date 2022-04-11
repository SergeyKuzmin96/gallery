<?php
require_once '../config/config_db.php';class DB
{
    private $connection;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

        if (!$this->connection) {
            throw new Exception("Нет соединения с БД", 500);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }


}