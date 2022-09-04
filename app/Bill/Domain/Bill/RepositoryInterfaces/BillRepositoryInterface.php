<?php

namespace App\Bill\Domain\Bill\RepositoryInterfaces;

interface BillRepositoryInterface
{
    public function findById($billId);
    public function findByStatus(Status $status);
    public function insert(Bill $bill);
    public function update(Bill $bill);
}
