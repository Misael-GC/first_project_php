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

        $stmt->bindColumn("amount", $amount);
        $stmt->bindColumn("description", $description);

        while ($stmt->fetch())
        echo "Ganaste $amount USD en: $description \n";

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
    public function show($id){
        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id = :id");
        $stmt->execute([":id"=> $id]);
    }
    public function edit(){}
    public function update($data, $id){
        $stmt = $this->connection->prepare("UPDATE incomes SET 
            payment_method = :payment_method, 
            type = :type, 
            date = :date, 
            amount = :amount, 
            description = :description
        WHERE id=:id;");

        $stmt->execute([
            ":id" => $id,
            ":payment_method" => $data["payment_method"],
            ":type" => $data["type"],
            ":date" => $data["date"],
            ":amount" => $data["amount"],
            ":description" => $data["description"],
        ]);

    }
    public function destroy($id){
        $this->connection->beginTransaction();

        //$this->connection->exec("DRP TABLE income_test"); //le vale la transacción se ejecuta solo sin preguntar

        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([":id"=> $id]);

        $sure = readline("¿De verdad quieres eliminar este registro? ");

        if($sure == "no")
            $this->connection->rollBack();
        else
            $this->connection->commit();
    }
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
