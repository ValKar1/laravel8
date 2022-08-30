<?php

class BillStatusWasChangedEvent
{
    private $bill; // TODO: or protected?
    private $status;

    public function __construct(Bill $bill, Status $status)
    {
        $this->bill = $bill;
        $this->status = $status;
    }
}
