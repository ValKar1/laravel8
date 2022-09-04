<?php

namespace App\Bill\Domain\Client\ServiceInterfaces;

interface ClientServiceInterface
{
    public function create($name, $address, $phone);
    public function changeAddress($clientId, $dto);
}
