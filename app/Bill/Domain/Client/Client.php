<?php
declare(strict_types=1);

namespace App\Bill\Domain\Client;

use App\Common\Domain\Entity;
use App\Bill\Domain\Client\ValueObjects\Name;
use App\Bill\Domain\Client\ValueObjects\Phone;
use App\Bill\Domain\Client\ValueObjects\Address;

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
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function changeAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }
}
