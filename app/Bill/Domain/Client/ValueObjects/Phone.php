<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client\ValueObjects;

use App\Common\Domain\ValueObject;
use App\Bill\Domain\Client\Validators\CountryCodeValidator;

class Phone extends ValueObject
{
    private $countryCode;
    private $cityCode;
    private $number;

    public function __construct(string $countryCode, string $cityCode, string $number)
    {
        $this->countryCode = $this->validateCountryCode(trim($countryCode));
        $this->cityCode = $this->validateCityCode(trim($cityCode));
        $this->number = $this->validateNumber(trim($number));
    }

    private function validateCountryCode(string $countryCode): string
    {
        (new CountryCodeValidator())->check($countryCode);
        return $countryCode;
    }

    private function validateCityCode(string $cityCode): string
    {
        return $cityCode;
    }

    private function validateNumber(string $number): string
    {
        return $number;
    }

    public function getPhoneNumber(): string
    {
        return $this->countryCode.' '.$this->cityCode.' '.$this->number;
    }
}
