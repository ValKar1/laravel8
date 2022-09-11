<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Controllers;

use App\Common\Laravel\Controller;
use App\Bill\Infrastructure\Services\BillService;
use App\Bill\Infrastructure\Requests\Bill\GetBillRequest;
use App\Bill\Infrastructure\Requests\Bill\CreateClientRequest;

class BillController extends Controller {

    private $billService;

    public function __construct(
        BillService $billService
    )
    {
        $this->billService = $billService;
    }

    public function createBillAction(CreateClientRequest $request) :string
    {
        $billId = $this->billService->create($request->client_id);
        return $billId;
    }

    public function getBillAction(GetBillRequest $request) :string
    {
        return "getBillAction";
    }
}
