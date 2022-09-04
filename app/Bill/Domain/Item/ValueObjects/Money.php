<?php

namespace App\Bill\Domain\Item\ValueObjects;

class Money extends ValueObject
{
    private $currency;
    private $amount;

    public function __construct(string $currency, int $amount)
    {
        $this->currency = $this->validateCurrency($currency);
        $this->amount = $this->validateAmount($amount);
    }

    public static function USD($amount): self
    {
        return new self('USD', $amount);
    }

    public function validateCurrency($currency)
    {
        return $currency;
    }

    public function validateAmount($amount)
    {
        return $amount;
    }
}
