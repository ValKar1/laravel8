<?php
declare(strict_types=1);

namespace App\Bill\Domain\Position;

use App\Common\Domain\Entity;
use App\Bill\Domain\Item\Item;

/**
 * Class Position
 */
class Position extends Entity
{
    protected $item;
    protected $quantity;

    public function __construct(Item $item, int $quantity = 1)
    {
        $this->item = $item;
        $this->quantity = $quantity;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @return int|mixed
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int|mixed $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): Money
    {
        return $this->item->getPrice();
    }

    public function getAmount(): float
    {
        return $this->item->getPrice()->getAmount();
    }
}
