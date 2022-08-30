<?php

namespace App\Userinterface\Controller;

use Illuminate\Http\Request;
use App\Infrastructure\Laravel\Controller;

class ClientController extends Controller {

    public function changeAddress(Request $request)
    {
        $clientId = $request->client_id;

        //$dto = AddressDto::fromRequest($request);
        //$this->clientRepository->changeAddress($clientId, $dto);

        return $clientId;
    }
}
