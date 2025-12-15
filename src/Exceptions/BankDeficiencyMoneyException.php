<?php

namespace Bank\Exceptions;

class BankDeficiencyMoneyException extends \Exception {
    public function __construct($message = "Недостаточно средств на счете") {
        parent::__construct($message);
    }
}