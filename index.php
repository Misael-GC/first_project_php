<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Enums\IncomeTypeEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\WithdrawlTypeEnum;

require("vendor/autoload.php");
$incomes_controller = new IncomesController();


// Conexión con  MySQLi
$incomes_controller->store([
    "payment_method" => PaymentMethodEnum::BankAccount->value,
    "type" => IncomeTypeEnum::Salary->value,
    "date"=> date("Y-m-d H:i:s"),
    "amount"=> 1000,
    "description"=> "Salario de junio"

]);


// $withdrawal_controller = new WithdrawalsController();
// $withdrawal_controller->store([
//     "payment_method" => PaymentMethodEnum::CreditCard->value,
//     "type" => WithdrawlTypeEnum::Purchase->value,
//     "date"=> date("Y-m-d H:i:s"),
//     "amount"=> 200,
//     "description"=> "Retiro de salario"
// ]);