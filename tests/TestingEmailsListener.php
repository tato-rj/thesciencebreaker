<?php

namespace Tests;

use Swift_Events_EventListener;

class TestingEmailsListener implements Swift_Events_EventListener
{
    protected $test;

    public function __construct($test)
    {
        $this->test = $test;    
    }

    public function beforeSendPerformed($event)
    {
        $message = $event->getMessage();
        $this->test->addEmail($event->getMessage());
    }
}