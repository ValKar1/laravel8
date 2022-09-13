<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client\ValueObjects;

use App\Common\Domain\ValueObject;
use App\Bill\Domain\Client\Validators\ZipValidator;

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
        $this->zip = $this->validateZip($zip, $country);
        $this->street = $this->validateStreet($street);
    }

    private function validateZip(string $zip, string $country): string
    {
        (new ZipValidator)->check($zip, $country);
        return $zip;
    }

    private function validateCity(string $city): string
    {
        return $city;
    }

    private function validateCountry(string $country): string
    {
        return $country;
    }

    private function validateStreet(string $street): string
    {
        return $street;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function getStreet(): string
    {
        return $this->street;
    }
}
