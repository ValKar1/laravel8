<?php

namespace App\Bill\Infrastructure\Controllers;

use App\Common\Laravel\Controller;
use App\Bill\Infrastructure\Requests\CreateBillRequest;

class BillController extends Controller {

    public function createBillAction(CreateBillRequest $request) :string
    {
        return "tut";
        // $billId = $this->billService->create($request->client_id);
        // return $billId;
    }

    public function getBillAction(CreateBillRequest $request) :string
    {
        return "getBillAction";
    }
}
