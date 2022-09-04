<?php

namespace App\Bill\Domain\Position;

/**
 * Class Position
 *
 */
class Position extends Entity
{
    protected $item;
    protected $quantity;

    public function __construct(Item $item, $quantity = 1)
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

    public function getPrice()
    {
        return $this->item->getPrice();
    }

    public function getAmount()
    {
        return $this->item->getPrice()->getAmount();
    }
}
