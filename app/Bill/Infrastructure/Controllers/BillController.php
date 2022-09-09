<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Controllers;

use App\Common\Laravel\Controller;
use App\Bill\Infrastructure\Requests\GetBillRequest;
use App\Bill\Infrastructure\Requests\CreateBillRequest;

class BillController extends Controller {

    public function createBillAction(CreateBillRequest $request) :string
    {
        return "tut";
        // $billId = $this->billService->create($request->client_id);
        // return $billId;
    }

    public function getBillAction(GetBillRequest $request) :string
    {
        return "getBillAction";
    }
}
