<?php

namespace App\Bill\Domain\Client\ServiceInterfaces;

use App\Bill\Infrastructure\DataTransferObjects\AddressDTO;

interface ClientServiceInterface
{
    public function create($name, $address, $phone);
    public function changeAddress(int $clientId, AddressDTO $dto);
}
