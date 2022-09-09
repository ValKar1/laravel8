<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Services;

use App\Bill\Domain\Client\RepositoryInterfaces\ClientRepositoryInterface;

class ClientService implements ClientServiceInterface
{
    public function __construct(
        ClientRepositoryInterface $clientRepository
    )
    {
        $this->clientRepository = $clientRepository;
    }

    public function create($name, $address, $phone)
    {
        // TODO: Implement create() method.
    }

    public function changeAddress($clientId, AddressDto $dto)
    {
        $client = $this->clientRepository->findById($clientId);
        $address = new Address(
            $dto->country,
            $dto->city,
            $dto->zip,
            $dto->street
        );
        $client->changeAddress($address);

        $this->clientRepository->update($client);
    }
}
