<?php

namespace Database\MySQLi;

class Connection{

    private static $instance;
    private $connection;

    private function __construct(){
        $this->make_connection();
    }

    public static function getInstance(){
        if(!self::$instance instanceof self)
            self::$instance = new self(); 
        return self::$instance;  //devolver instancia única
    }

    public function get_database_instance(){
        return $this->connection;
    }

    private function make_connection(){

        $server="127.0.0.1";
        $database="finanzas_personales";
        $username = "root";
        $password = "Misael_12";

        //procedural
        $mysqli = new \mysqli($server, $username, $password, $database);


        //comprobar conexion conexion poo

        if($mysqli->connect_errno)
            die("fallo la conexión: {$mysqli->connect_error}");


        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $mysqli;

    }
}

