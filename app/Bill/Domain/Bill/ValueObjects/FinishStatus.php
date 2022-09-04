<?php

namespace App\Bill\Domain\Bill\ValueObjects;

class FinishStatus extends Status
{
    protected $name = 'finish';
    protected $next = [];
}
