<?php

namespace App\Bill\Domain\Client\ValueObjects;

class Address extends ValueObject
{
    private $country;
    private $city;
    private $zip;
    private $street;

    public function __construct(string $country, string $city, string $zip, string $street)
    {
        $this->country = $this->validateCountry($country);
        $this->city = $this->validateCity($city);
        $this->zip = $this->validateZip($zip);
        $this->street = $this->validateStreet($street);
    }

    public function validateZip($zip)
    {
        if (!preg_match('/^\+\d+$/', $zip)) {
            //TODO:
            throw new ZipValidationException($zip);
        }
        return $zip;
    }

    public function validateCity($city)
    {
        return $city;
    }

    public function validateCountry($country)
    {
        return $country;
    }

    public function validateStreet($street)
    {
        return $street;
    }
}
