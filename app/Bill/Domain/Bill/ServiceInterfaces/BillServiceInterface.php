<?php

namespace App\Bill\Domain\Bill\ServiceInterfaces;

interface BillServiceInterface
{
    public function create($clientId);
    public function addPosition($billId, $itemId, $quantity);
    public function reject($billId);
    public function process($billId);
}
