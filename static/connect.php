<?php

class DbConnection
{
    protected static $instance;

    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function initDbConnection($Host, $User, $Password): PDO
    {
        $initDb = new PDO($Host, $User, $Password);
        return $initDb;
    }

    private function __construct(){
    }
    private function __clone(){}
    public function __wakeup(){}

}



