<?php

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

    public function validateCountryCode($countryCode)
    {
        return $countryCode;
    }

    public function validateCityCode($cityCode)
    {
        return $cityCode;
    }

    public function validateNumber($number)
    {
        return $number;
    }
}
