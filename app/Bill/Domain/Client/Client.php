<?php

namespace App\Bill\Domain\Client;

use App\Bill\Domain\Client\Exceptions\PhoneValidationException;

/**
 * Class Client
 *
 * DDD-Aggregate
 */
class Client extends Entity
{
    private $id;
    private $name;
    private $address;
    private $phone;

    public function __construct($id, Name $name, Address $address, Phone $phone)
    {
        if (!preg_match('/\+\d+/', $phone)) {
            throw new PhoneValidationException();
        }

        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function changeAddress(Address $address)
    {
        $this->address = $address;
    }
}
