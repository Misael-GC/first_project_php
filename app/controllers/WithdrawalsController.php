<?php

namespace App\Controllers;
use Database\PDO\Conection;
class WithdrawalsController{
    private $connection;
    public function __construct(){
        $this->connection = Conection::getInstance()->get_database_instance();
    }

    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals");
        $stmt->execute();

        //fetchAl
        $results = $stmt->fetchAll();

        foreach($results as $results){
            echo $results["id"]. " - ". $results["payment_method"]. " - ". $results["type"]. " - ". $results["time"]. " - ". $results["amount"]. " - ". $results["description"]. "\n";
        } 


        // Fetch Column
        /*
        $stmt = $this->connection->prepare("SELECT amount, description FROM withdrawals");
        $stmt->execute();

        $results = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);

        foreach($results as $result){
            echo "Gastaste $result USD\n";
        }
        */
    }
    public function create(){}
    public function store($data){
        //$connection = Conection::getInstance()->get_database_instance();
        
        $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type, time, amount, description) VALUES(:payment_method, :type, :time, :amount, :description)");

        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":time", $data["time"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);

        $stmt->execute($data);
    }
    public function show($id){
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();

        echo "El registro id $id dice que te gastaste {$result['amount']} USD en {$result['description']}";
    }
    public function edit(){}
    public function update(){}
    public function destroy(){}
}


/*
        {$data['payment_method']},
        {$data['type']},
        '{$data['time']}',
        {$data['amount']},
        '{$data['description']}'
 */

 /*
Los 7 métodos que suelen tener los controladores:
index: muestra la lista de todos los recursos.
create: muestra un formulario para ingresar un nuevo recurso. (luego manda a llamar al método store).
store: registra dentro de la base de datos el nuevo recurso.
show: muestra un recurso específico.
edit: muestra un formulario para editar un recurso. (luego manda a llamar al método update).
update: actualiza el recurso dentro de la base de datos.
destroy: elimina un recurso.
 */