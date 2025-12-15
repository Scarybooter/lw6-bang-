<?php
require_once "vendor/autoload.php";

use Bank\BankAccount;
use Bank\Exceptions\BankDeficiencyMoneyException;
use Bank\Exceptions\BankInvalidAmountException;

$lk = new BankAccount(1000);

try {

    echo $lk->getBalance() . PHP_EOL;
    $lk->deposit(200);
    echo $lk->getBalance() . PHP_EOL;
    $lk->withdraw(840);
    echo $lk->getBalance() . PHP_EOL;
    $lk->withdraw(400);

} catch (BankInvalidAmountException $e) {
    echo $e->getMessage();
} catch (BankDeficiencyMoneyException $e) {
    // Недостаточно средств для снятия
    echo $e->getMessage() . PHP_EOL;
}
