<?php

namespace App\Bill\Infrastructure\ServiceAlternatives;

/**
 * Class BillPositionsMerger
 *
 * Alternative to BillOptimiserService
 *
 * In BillService:
 * (new BillPositionsMerger($bill))->run();
 */
class BillPositionsMerger
{
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    public function run()
    {
        while ($pairs = $this->findSimilarPositions()) {
            foreach ($pairs as $pair) {
                $this->mergePositions($pair);
            }
        }
    }

    public function findSimilarPositions()
    {

    }

    public function mergePositions()
    {

    }
}
