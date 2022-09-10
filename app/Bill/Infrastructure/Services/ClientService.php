<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Services;

use App\Bill\Domain\Client\ValueObjects\Address;
use App\Bill\Infrastructure\DataTransferObjects\AddressDTO;
use App\Bill\Infrastructure\Repositories\SQL\ClientRepository;
use App\Bill\Domain\Client\ServiceInterfaces\ClientServiceInterface;

class ClientService implements ClientServiceInterface
{
    private $clientRepository;

    public function __construct(
        ClientRepository $clientRepository
    )
    {
        $this->clientRepository = $clientRepository;
    }

    public function create($name, $address, $phone)
    {
        // TODO: Implement create() method.
    }

    public function changeAddress(int $clientId, AddressDTO $dto)
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
