<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Repositories\SQL;

use Illuminate\Support\Facades\DB;
use App\Bill\Domain\Client\Client;
use App\Bill\Domain\Client\ValueObjects\Name;
use App\Bill\Domain\Client\ValueObjects\Phone;
use App\Bill\Domain\Client\ValueObjects\Address;
use App\Bill\Domain\Client\RepositoryInterfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    public function findById($clientId): Client
    {
        $clientData = DB::table('client')
            ->select('*')
            ->where('id', $clientId)
            ->first();

        $id = $clientData->id;

        $address = new Address(
            $clientData->country,
            $clientData->city,
            $clientData->zip,
            $clientData->street
        );

        $name = new Name(
            $clientData->firstname,
            $clientData->lastname
        );

        $phone = explode(' ', $clientData->phone);
        $phone = new Phone(
            $phone[0],
            $phone[1],
            $phone[2]
        );

        return new Client($id, $name, $address, $phone);
    }

    public function create(Client $client): bool
    {
        // DB::beginTransaction();

        return DB::table('client')->insert([
            'id' => $client->getId(),
            'firstname' => $client->getName()->getFirstname(),
            'lastname' => $client->getName()->getLastname(),
            'phone' => $client->getPhone()->getPhoneNumber(),
            'country' => $client->getAddress()->getCountry(),
            'city' => $client->getAddress()->getCity(),
            'zip' => $client->getAddress()->getZip(),
            'street' => $client->getAddress()->getStreet()
        ]);

        // DB::commit();
    }

    public function update(Client $client): int
    {
        return DB::table('client')
            ->where('id', $client->getId())
            ->update([
                'firstname' => $client->getName()->getFirstname(),
                'lastname' => $client->getName()->getLastname(),
                'phone' => $client->getPhone()->getPhoneNumber(),
                'country' => $client->getAddress()->getCountry(),
                'city' => $client->getAddress()->getCity(),
                'zip' => $client->getAddress()->getZip(),
                'street' => $client->getAddress()->getStreet()
            ]);
    }
}
