<?php

interface BillServiceInterface
{
    public function create($clientId);
    public function addPosition($billId, $itemId, $quantity);
    public function reject($billId);
    public function process($billId);
}
