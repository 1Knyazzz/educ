<?php

class DbConnection
{
    private $host = 'pgsql:host=localhost;port=5432;dbname=test';
    private $username = 'root';
    private $password = '1';
    protected static $instance;
    public $connection;

    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function initDbConnection(): PDO
    {
        $this -> connection = null;

        try {
            $this->connection = new PDO($this->host, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }
        return $this->connection;
    }

    private function __construct(){
    }
    private function __clone(){}
    public function __wakeup(){}

}