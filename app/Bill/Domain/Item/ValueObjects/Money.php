<?php
declare(strict_types=1);

namespace App\Bill\Domain\Item\ValueObjects;

use App\Common\Domain\ValueObject;

class Money extends ValueObject
{
    private $currency;
    private $amount;

    public function __construct(string $currency, float $amount)
    {
        $this->currency = $this->validateCurrency($currency);
        $this->amount = $this->validateAmount($amount);
    }

    public static function USD($amount): self
    {
        return new self('USD', $amount);
    }

    private function validateCurrency(string $currency): string
    {
        return $currency;
    }

    private function validateAmount(float $amount): float
    {
        return $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
