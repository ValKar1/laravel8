<?php

namespace App\Bill\Domain\Client\RepositoryInterfaces;

interface ClientRepositoryInterface
{
    public function findById($clientId);
}
