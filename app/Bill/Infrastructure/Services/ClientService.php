<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Services;

use Illuminate\Support\Str;
use App\Bill\Domain\Client\Client;
use App\Bill\Infrastructure\DTOs\ClientDTO;
use App\Bill\Infrastructure\DTOs\AddressDTO;
use App\Bill\Domain\Client\ValueObjects\Name;
use App\Bill\Domain\Client\ValueObjects\Phone;
use App\Bill\Domain\Client\ValueObjects\Address;
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

    public function createClient(ClientDTO $dto)
    {
        $id = Str::uuid();

        $address = new Address(
            $dto->country,
            $dto->city,
            $dto->zip,
            $dto->street
        );

        $name = new Name(
          $dto->firstname,
          $dto->lastname
        );

        $phone = new Phone(
            $dto->phoneCountryCode,
            $dto->phoneCityCode,
            $dto->phoneNumber
        );

        $client = new Client($id, $name, $address, $phone);

        return $client->getId();
    }

    public function changeAddress($clientId, AddressDTO $dto)
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
