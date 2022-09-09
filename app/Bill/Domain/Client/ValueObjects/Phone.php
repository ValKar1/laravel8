<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client\ValueObjects;

use App\Common\Domain\ValueObject;

class Phone extends ValueObject
{
    private $countryCode;
    private $cityCode;
    private $number;

    public function __construct(string $countryCode, string $cityCode, string $number)
    {
        $this->countryCode = $this->validateCountryCode($countryCode);
        $this->cityCode = $this->validateCityCode($cityCode);
        $this->number = $this->validateNumber($number);
    }

    public function validateCountryCode(string $countryCode): string
    {
        return $countryCode;
    }

    public function validateCityCode(string $cityCode): string
    {
        return $cityCode;
    }

    public function validateNumber(string $number): string
    {
        return $number;
    }
}
