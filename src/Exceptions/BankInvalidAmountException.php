<?php

namespace Bank\Exceptions;

class BankInvalidAmountException extends \Exception {
    public function __construct($message = "Сумма должна быть больше нуля") {
        parent::__construct($message);
    }
}