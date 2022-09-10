<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Repositories\SQL;

use Illuminate\Database\Connection;
use App\Bill\Domain\Item\RepositoryInterfaces\ItemRepositoryInterface;

class ItemRepository implements ItemRepositoryInterface
{
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    public function findById($itemId)
    {
        // TODO: Implement findById() method.
    }
}
