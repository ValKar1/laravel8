<?php
declare(strict_types=1);

namespace App\Bill\Domain\Item;

use App\Common\Domain\Entity;
use App\Bill\Domain\Item\ValueObjects\Money;

/**
 * Class Item
 *
 * DDD-Aggregate
 *
 * Required params comes to constructor. Optional params set with setters.
 */
class Item extends Entity
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct(int $id, string $name, Money $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice(): Money
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice(Money $price): void
    {
        $this->price = $price;
    }
}
