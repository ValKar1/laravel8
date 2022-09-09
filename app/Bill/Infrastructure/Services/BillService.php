<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Services;

use Illuminate\Support\Str;
use App\Bill\Domain\Bill\Bill;
use App\Bill\Domain\Bill\ValueObjects\NewStatus;
use App\Bill\Domain\Bill\ValueObjects\RejectStatus;
use App\Bill\Infrastructure\Services\BillOptimiserService;
use App\Bill\Domain\Item\RepositoryInterfaces\ItemRepositoryInterface;
use App\Bill\Domain\Bill\RepositoryInterfaces\BillRepositoryInterface;
use App\Bill\Domain\Client\RepositoryInterfaces\ClientRepositoryInterface;

class BillService implements BillServiceInterface
{
    public function __construct(
        ItemRepositoryInterface $itemRepository,
        BillRepositoryInterface $billRepository,
        BillOptimiserService $billOptimiserService,
        ClientRepositoryInterface $clientRepository
    )
    {
        $this->itemRepository = $itemRepository;
        $this->billRepository = $billRepository;
        $this->clientRepository = $clientRepository;
        $this->billOptimiserService = $billOptimiserService;
    }


    public function create($clientId)
    {
        $client = $this->clientRepository->findById($clientId);

        $bill = new Bill(Str::uuid(), $client);
        $bill->changeStatus(new NewStatus());

        $this->billRepository->create($bill);

        return $bill->getId();
    }

    public function addPosition($billId, $itemId, $quantity)
    {
        $bill = $this->billRepository->findById($billId);
        $item = $this->itemRepository->findById($itemId);

        $bill->addPosition($item, $quantity);
        $this->billOptimiserService->mergePositions($bill);

        $this->billRepository->update($bill);
    }

    public function reject($billId)
    {
        $bill = $this->billRepository->findById($billId);

//        throw Exception in repository
//        if ($bill === null) {
//            return null;
//        }

        $bill->changeStatus(new RejectStatus());

        $result = $this->billRepository->update($bill);

//        throw Exceptions in repository
//        if ($result !== false) {
//            return null;
//        }

        $this->dispatcher->dispatchEvents($bill->releaseEvents()); // TODO: create dispatcher

        return true;
    }

    public function process($billId)
    {
        // TODO: wystawit' shhjot klientu
    }
}
