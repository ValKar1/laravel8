<?php

namespace App\Bill\Domain\Bill\ValueObjects;

class RejectStatus extends Status
{
    protected $name = 'reject';
    protected $next = [];
}
