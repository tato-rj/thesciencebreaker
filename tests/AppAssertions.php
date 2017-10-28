<?php

namespace Tests;


trait AppAssertions
{
    protected function seeEmailWasSent()
    {
        $this->assertNotEmpty($this->emails, 'No emails were sent.');
        return $this;
    }

    protected function seeEmailsSent($count)
    {
        $emailsSent = count($this->emails);
        $this->assertCount(
            $count, $this->emails,
            "Expected $count emails to have been sent. Number of sent emails: $emailsSent."
        );
        return $this;
    }

    protected function seeEmailWasNotSent()
    {
        $this->assertEmpty($this->emails, 'You did send emails! Did not expect that.');
    }

    protected function seeEmailTo($recipient)
    {
        $hasEmail = false;

        foreach ($this->emails as $email) {
            if (array_key_exists($recipient, $email->getTo())) {
                $hasEmail = true;
            }    
        }
        $this->assertTrue($hasEmail, "$recipient did not receive an email.");

        return $this;
    }

    protected function seeEmailFrom($sender)
    {
        $sentEmail = false;

        foreach ($this->emails as $email) {
            if (array_key_exists($recipient, $email->getFrom())) {
                $sentEmail = true;
            }    
        }
        $this->assertTrue($sentEmail, "$sender did not send an email.");

        return $this;
    }

    public function seeEmailContains($excerpt)
    {
        $contains = false;

        foreach ($this->emails as $email) {
            if (strpos($email->getBody(), $excerpt)) {
                $contains = true;
            }    
        }

        $this->assertTrue($contains, "No email containing the text has been found.");
    }

    protected function getEmail(Swift_Message $message = null)
    {
        $this->seeEmailWasSent();
        return $message ?: end($this->emails);
    }
}