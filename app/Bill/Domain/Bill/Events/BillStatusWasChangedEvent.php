<?php
declare(strict_types=1);

namespace App\Bill\Domain\Bill\Events;

use App\Bill\Domain\Bill\Bill;

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
