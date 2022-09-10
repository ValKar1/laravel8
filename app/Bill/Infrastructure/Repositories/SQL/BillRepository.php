<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Repositories\SQL;

use Illuminate\Database\Connection;
use App\Bill\Domain\Bill\Bill;
use App\Bill\Domain\Bill\ValueObjects\Status;
use App\Bill\Domain\Bill\RepositoryInterfaces\BillRepositoryInterface;

class BillRepository implements BillRepositoryInterface {

    public function __construct(Connection $db) {
        $this->db = $db;
    }

    public function create(Bill $bill)
    {
        $this->db->transactionBegin();

        $this->db->insert('bill', [
            'id' => $bill->getId(),
            'client_id' => $bill->getClient()->getId(),
            'status' => $bill->getStatus()
        ]);

        foreach ($bill->getPositions() as $position) {
            $this->db->insert('bill_position', [
                'item_id' => $position->getItem()->getId(),
                'quantity' => $position->getQuantity()
            ]);
        }

        $this->transactionCommit();
    }

    public function findById($billId)
    {
        // TODO: Implement findById() method.
    }

    public function findByStatus(Status $status)
    {
        // TODO: Implement findByStatus() method.
    }

    public function insert(Bill $bill)
    {
        // TODO: Implement insert() method.
    }

    public function update(Bill $bill)
    {
        // TODO: Implement update() method.
    }
}
