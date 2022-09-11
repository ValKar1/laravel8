<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client\Validators;

class CountryCodeValidator {

    public function check($countryCode)
    {
        if (!$this->validateCountryCode($countryCode)) {

        }

        return true;
    }

    protected function validateCountryCode($countryCode)
    {
        return false;
    }
}
