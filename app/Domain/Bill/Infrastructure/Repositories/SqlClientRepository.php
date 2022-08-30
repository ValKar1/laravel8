<?php

class SqlClientRepository implements ClientRepositoryInterface
{
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    public function create(Bill $bill) {
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

    public function findById($id)
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
