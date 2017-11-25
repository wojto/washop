<?php

namespace Shop\Domain\Transport;

/**
 * Interface for Mailer
 *
 * @package Shop\Domain\Transport
 */
interface MailerInterface
{
    /**
     * Send message method
     *
     * @param  $message
     * @return mixed
     */
    public function send($message);
}
