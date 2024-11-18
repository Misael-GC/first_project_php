<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Enums\IncomeTypeEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\WithdrawlTypeEnum;

require("vendor/autoload.php");
$incomes_controller = new IncomesController();


// Conexión con  MySQLi
/*$incomes_controller->store([
    "payment_method" => PaymentMethodEnum::BankAccount->value,
    "type" => IncomeTypeEnum::Salary->value,
    "date"=> date("Y-m-d H:i:s"),
    "amount"=> 1000,
    "description"=> "Salario de junio"

]);*/


//Conexión con PDO
/*$withdrawal_controller = new withdrawalscontroller();
$withdrawal_controller->store([
    "payment_method" => PaymentMethodEnum::CreditCard->value,
    "type" => WithdrawlTypeEnum::Purchase->value,
    "time"=> date("y-m-d h:i:s"),
    "amount"=> 20,
    "description"=> "Compras Buen Fin sunday 17/11/2024"
]);
*/
/*
$withdrawal_controller = new withdrawalscontroller();
$withdrawal_controller->index();
*/

/*
$withdrawal_controller = new withdrawalscontroller();
$withdrawal_controller->index();
*/

/*
$withdrawal_controller = new withdrawalscontroller();
$withdrawal_controller->show(1);
*/

/*
$incomes_controller = new IncomesController();
$incomes_controller->index();
*/

$incomes_controller = new IncomesController();
$incomes_controller->destroy(1);

