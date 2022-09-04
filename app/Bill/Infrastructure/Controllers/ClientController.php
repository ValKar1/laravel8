<?php

namespace App\Bill\Infrastructure\Controllers;

use Illuminate\Http\Request;
use App\Infrastructure\Laravel\Controller;

class ClientController extends Controller
{
    public function actionChangeAddress(Request $request)
    {
        return "tut2";
        $clientId = $request->client_id;
        $dto = AddressDto::fromRequest($this->request);
        $this->clientService->changeAddress($clientId, $dto);

        return $clientId;
    }
}
