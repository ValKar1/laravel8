<?php

namespace App\Bill\Domain\Client\ServiceInterfaces;

use App\Bill\Infrastructure\DTOs\ClientDTO;
use App\Bill\Infrastructure\DTOs\AddressDTO;

interface ClientServiceInterface
{
    public function createClient(ClientDTO $dto);
    public function changeAddress($clientId, AddressDTO $dto);
}
