<?php

use Illuminate\Support\Str;

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

        $this->dispatcher->dispatchEvents($bill->releaseEvents()); //TODO: create dispatcher

        return true;
    }

    public function process($billId)
    {
        // TODO: Implement process() method.
    }
}
