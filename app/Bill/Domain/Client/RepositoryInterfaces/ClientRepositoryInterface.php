<?php

namespace App\Bill\Domain\Client\RepositoryInterfaces;

use App\Bill\Domain\Client\Client;

interface ClientRepositoryInterface
{
    public function findById($clientId);
    public function create(Client $client);
    public function update(Client $client);
}
