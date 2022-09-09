<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Controllers;

use Illuminate\Http\Request;
use App\Common\Laravel\Controller;

class ClientController extends Controller
{
    public function changeAddressAction(Request $request)
    {
        return "tut2";
        $clientId = $request->client_id;
        $dto = AddressDto::fromRequest($this->request);
        $this->clientService->changeAddress($clientId, $dto);

        return $clientId;
    }

    public function getAddressAction(Request $request)
    {
        return 'getAddressAction';
    }
}
