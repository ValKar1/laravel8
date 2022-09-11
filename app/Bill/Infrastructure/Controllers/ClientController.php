<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Controllers;

use App\Common\Laravel\Controller;
use App\Bill\Infrastructure\DTOs\ClientDTO;
use App\Bill\Infrastructure\DTOs\AddressDTO;
use App\Bill\Infrastructure\Services\ClientService;
use App\Bill\Infrastructure\Requests\Address\GetAddressRequest;
use App\Bill\Infrastructure\Requests\Client\CreateClientRequest;
use App\Bill\Infrastructure\Requests\Address\ChangeAddressRequest;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(
        ClientService $clientService
    )
    {
        $this->clientService = $clientService;
    }

    public function createClientAction(CreateClientRequest $request)
    {
        $clientDTO = ClientDTO::fromRequest($request);
        $clientId = $this->clientService->createClient($clientDTO);
        return $clientId;
    }

    public function changeAddressAction(ChangeAddressRequest $request)
    {
        $clientId = $request->client_id;
        $addressDTO = AddressDTO::fromRequest($request);
        $this->clientService->changeAddress($clientId, $addressDTO);

        return $clientId;
    }

    public function getAddressAction(GetAddressRequest $request): string
    {
        return 'getAddressAction';
    }
}
