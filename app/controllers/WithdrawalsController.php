<?php

namespace App\Controllers;
use Database\PDO\Conection;
class WithdrawalsController{

    public function index(){}
    public function create(){}
    public function store($data){
        $connection = Conection::getInstance()->get_database_instance();
        
        $stmt = $connection->prepare("INSERT INTO withdrawals (payment_method, type, time, amount, description) VALUES(:payment_method, :type, :time, :amount, :description)");

        $stmt->execute($data);
    }
    public function show(){}
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