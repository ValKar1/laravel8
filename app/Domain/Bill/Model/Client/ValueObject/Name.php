<?php

class Name extends ValueObject
{
    private $firstname;
    private $lastname;

    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $this->validateFirstname($firstname);
        $this->lastname = $this->validateLastname($lastname);
    }

    public function validateFirstname($firstname)
    {
        return $firstname;
    }

    public function validateLastname($lastname)
    {
        return $lastname;
    }
}
