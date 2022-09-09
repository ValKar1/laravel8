<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client;

use App\Common\Domain\Entity;
use App\Bill\Domain\Client\ValueObjects\Name;
use App\Bill\Domain\Client\ValueObjects\Phone;
use App\Bill\Domain\Client\ValueObjects\Address;
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

    public function __construct(int $id, Name $name, Address $address, Phone $phone)
    {
        if (!preg_match('/\+\d+/', $phone)) {
            throw new PhoneValidationException();
        }

        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function changeAddress(Address $address): void
    {
        $this->address = $address;
    }
}
