<?php

namespace App\Bill\Domain\Item\RepositoryInterfaces;

interface ItemRepositoryInterface
{
    public function findById($itemId);
}
