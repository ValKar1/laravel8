<?php

interface ClientServiceInterface
{
    public function create($name, $address, $phone);
    public function changeAddress($clientId, $dto);
}
