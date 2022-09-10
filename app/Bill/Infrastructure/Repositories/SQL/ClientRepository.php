<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Repositories\SQL;

use Illuminate\Database\Connection;
use App\Bill\Domain\Client\RepositoryInterfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    public function findById($clientId)
    {
        // TODO: Implement findById() method.
    }
}
