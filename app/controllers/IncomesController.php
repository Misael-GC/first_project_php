<?php

namespace App\Controllers;

use Database\MySQLi\Connection;

class IncomesController{

    public function index(){}
    public function create(){}
    public function store($data){
        $connection = Connection::getInstance()->get_database_instance();

        $connection->prepare("INSERT INTO incomes(payment_method, type, date, amount, description) VALUES(
            ?, ?, ?, ?, ?
        )");
        
        /*{$data['payment_method']},
            {$data['type']},
            '{$data['date']}',
            {$data['amount']},
            '{$data['description']}' */

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