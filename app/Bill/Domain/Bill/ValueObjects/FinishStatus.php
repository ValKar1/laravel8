<?php
declare(strict_types=1);

namespace App\Bill\Domain\Bill\ValueObjects;

class FinishStatus extends Status
{
    protected $name = 'finish';
    protected $next = [];
}
