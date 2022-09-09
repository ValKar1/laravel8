<?php
declare(strict_types=1);

namespace App\Bill\Domain\Bill\ValueObjects;

class ProcessingStatus extends Status
{
    protected $name = 'processing';
    protected $next = [FinishStatus::class, RejectStatus::class];
}
