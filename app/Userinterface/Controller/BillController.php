<?php

namespace App\Userinterface\Controller;

use Illuminate\Http\Request;
use App\Infrastructure\Laravel\Controller;

class BillController extends Controller {

    public function createBill(Request $request)
    {
        $billId = $this->billService->create($request->client_id);

        return $billId;
    }
}
