<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client\ValueObjects;

use App\Common\Domain\ValueObject;

class Name extends ValueObject
{
    private $firstname;
    private $lastname;

    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $this->validateFirstname($firstname);
        $this->lastname = $this->validateLastname($lastname);
    }

    public function validateFirstname(string $firstname): string
    {
        return $firstname;
    }

    public function validateLastname(string $lastname): string
    {
        return $lastname;
    }
}
