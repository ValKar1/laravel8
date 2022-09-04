<?php

namespace App\Bill\Infrastructure\Services;

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
