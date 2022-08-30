<?php

class NewStatus extends Status
{
    protected $name = 'new';
    protected $next = [ProcessingStatus::class, RejectStatus::class];
}
