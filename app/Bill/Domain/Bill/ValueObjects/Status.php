<?php

namespace App\Bill\Domain\Bill\ValueObjects;

abstract class Status extends ValueObject
{
    protected $name;
    protected $next = [];

    public function getName()
    {
        return $this->name;
    }

    public function canBeChangedTo(self $status): bool
    {
        return in_array(get_class($status), $this->next, true);
    }

    public function allowModification(): bool
    {
        return true;
    }

    public function ensureCanBeChangedTo(self $status)
    {
        if (!$this->canBeChangedTo($status)) {
            throw new WrongStatusChangeDirection();
        }
    }

    public function ensureAllowModification()
    {
        if (!$this->allowModification()) {
            throw new ModificationProhibitedException();
        }
    }
}
