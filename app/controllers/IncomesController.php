<?php

namespace App\Controllers;

use Database\PDO\Conection;

class IncomesController{

    private $connection;
    public function __construct(){
        $this->connection = Conection::getInstance()->get_database_instance();
    }


    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();

        while ($row = $stmt->fetch())
        echo "Ganaste " . $row["amount"] . " USD en:" . $row["description"] . "\n";

    }
    public function create(){}
    public function store($data){

        $stmt = $this->connection->prepare("INSERT INTO incomes(payment_method, type, date, amount, description) VALUES(:payment_method, :type, :date, :amount, :description)");

        $stmt->bindValue(':payment_method', $data['payment_method']);
        $stmt->bindValue(':type', $data['type']);
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':amount', $data['amount']);
        $stmt->bindValue(':description', $data['description']);

        $stmt->execute();
    }
    public function show(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}
}

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
