<?php

namespace Bank;

use Bank\Exceptions\BankDeficiencyMoneyException;
use Bank\Exceptions\BankInvalidAmountException;


class BankAccount {
    private float $balance;

    public function __construct(float $initialBalance = 0.0) {
        if ($initialBalance < 0) {
            throw new BankInvalidAmountException("Начальный баланс не может быть отрицательным");
        }
        $this->balance = $initialBalance;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function deposit(float $amount): void {
        if ($amount <= 0) {
            throw new BankInvalidAmountException("Сумма пополнения должна превышать 0");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void {
        if ($amount <= 0) {
            throw new BankInvalidAmountException("Сумма обналичивания должна быть больше нуля");
        }
        if ($amount > $this->balance) {
            throw new BankDeficiencyMoneyException(
                "Недостаточно средств: ваш баланс составляет: {$this->balance}, вы хотите снять $amount"
            );
        }
        $this->balance -= $amount;
    }
}