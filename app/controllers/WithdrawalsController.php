<?php

namespace App\Controllers;
use Database\PDO\Conection;
class WithdrawalsController{

    public function index(){}
    public function create(){}
    public function store($data){
        $connection = Conection::getInstance()->get_database_instance();
        
        $affected_rows = $connection->exec("INSERT INTO withdrawals (payment_method, type, time, amount, description) VALUES(
        {$data['payment_method']},
        {$data['type']},
        '{$data['time']}',
        {$data['amount']},
        '{$data['description']}'
        )");

        // echo json_encode($affected_rows);
        echo "Se han insertado $affected_rows filas en la BD";
    }
    public function show(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}
}