<?php
declare(strict_types=1);

namespace App\Bill\Infrastructure\Services;

use App\Bill\Domain\Bill\Bill;

class BillOptimiserService
{
    public function mergePositions(Bill $bill)
    {
        $this->findSimilarPositions($bill);
    }

    private function findSimilarPositions(Bill $bill)
    {
        foreach ($bill->getPositions() as $position) { // Position_1: Tisch 1 Stück, Position_2: Tisch 2 Stück
            // Merge positions of same item
        }
    }
}
