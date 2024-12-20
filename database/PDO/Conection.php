<?php

namespace Database\PDO;

class Conection{
    private static $instance;
    private $connection;

    private function __construct(){
        $this->make_connection();
    }

    public static function getInstance(){
        if(!self::$instance instanceof self)
        self::$instance = new self();

        return self::$instance;
    }

    public function get_database_instance(){
        return $this->connection;
    }

    private function make_connection(){

        $server="127.0.0.1";
        $database="finanzas_personales";
        $username = "root";
        $password = "Misael_12";

        try {
            $this->connection = new \PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }


        //$setnames = $conection->prepare("SET NAMES 'utf8'");
        //$setnames->execute();

    }
}

