<?php
declare(strict_types=1);

namespace App\Bill\Domain\Bill;

use App\Common\Domain\Entity;
use App\Bill\Domain\Client\Client;
use App\Bill\Domain\Position\Position;
use App\Bill\Domain\Bill\ValueObjects\Status;
use App\Bill\Domain\Bill\ValueObjects\NewStatus;
use App\Bill\Domain\Bill\Events\BillStatusWasChangedEvent;

/**
 * Class Bill
 *
 * DDD-Aggregate
 */
class Bill extends Entity
{
    protected $id;
    protected $client;
    protected $positions;
    protected $status;

    public function __construct(int $id, Client $client)
    {
        $this->id = $id;
        $this->client = $client;
        $this->status = new NewStatus();
    }

    public function changeStatus(Status $status)
    {
        $this->status->ensureCanBeChangedTo($status);
        $this->status = $status;

        $this->registerEvent(new BillStatusWasChangedEvent($this, $status));
    }

    public function registerEvent($event) // TODO: move in Trait
    {
        $this->vents[] = $event;
    }

    public function releaseEvents()
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }


    public function addPosition(Position $position)
    {
        $this->status->ensureAllowModification();
        $this->positions->push($position);
    }

    public function removePosition(Position $position)
    {
        $this->status->ensureAllowModification();
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
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return mixed
     */
    public function getPositions(): Position
    {
        return $this->positions;
    }

    /**
     * @return mixed
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}
