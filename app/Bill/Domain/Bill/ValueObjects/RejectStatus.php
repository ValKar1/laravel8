<?php
declare(strict_types=1);

namespace App\Bill\Domain\Bill\ValueObjects;

class RejectStatus extends Status
{
    protected $name = 'reject';
    protected $next = [];
}
