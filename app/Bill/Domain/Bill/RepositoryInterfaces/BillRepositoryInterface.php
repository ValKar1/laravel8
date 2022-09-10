<?php

namespace App\Bill\Domain\Bill\RepositoryInterfaces;

use App\Bill\Domain\Bill\Bill;
use App\Bill\Domain\Bill\ValueObjects\Status;

interface BillRepositoryInterface
{
    public function create(Bill $bill);
    public function findById($billId);
    public function findByStatus(Status $status);
    public function insert(Bill $bill);
    public function update(Bill $bill);
}
