<?php

namespace Tests;

use Mail;
use Swift_Message;

trait MailManagement
{
    protected $emails = [];

    public function setUp()
    {
        parent::setUp();
        Mail::getSwiftMailer()->registerPlugin(new TestingEmailsListener($this));
    }

    public function addEmail(Swift_Message $email)
    {
        $this->emails[] = $email;
    }
}