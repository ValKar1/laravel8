<?php

class ProcessingStatus extends Status
{
    protected $name = 'processing';
    protected $next = [FinishStatus::class, RejectStatus::class];
}
