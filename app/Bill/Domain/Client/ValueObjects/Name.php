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

    private function validateFirstname(string $firstname): string
    {
        return $firstname;
    }

    private function validateLastname(string $lastname): string
    {
        return $lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }
}
