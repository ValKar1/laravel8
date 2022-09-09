<?php
declare(strict_types=1);

namespace App\Bill\Domain\Item\ValueObjects;

use App\Common\Domain\ValueObject;

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

    public function validateCurrency(string $currency): string
    {
        return $currency;
    }

    public function validateAmount(int $amount): int
    {
        return $amount;
    }
}
