<?php
declare(strict_types=1);

namespace App\Bill\Domain\Bill\ValueObjects;

class NewStatus extends Status
{
    protected $name = 'new';
    protected $next = [ProcessingStatus::class, RejectStatus::class];
}
