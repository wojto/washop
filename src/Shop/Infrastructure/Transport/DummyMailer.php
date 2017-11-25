<?php

namespace Shop\Infrastructure\Transport;

use Shop\Domain\Model\ProductInterface;
use Shop\Domain\Transport\MailerInterface;

/**
 * Dummy implementation of mailer
 *
 * @package Shop\Infrastructure\Transport
 */
class DummyMailer implements MailerInterface
{
    /**
     * @param Product $product
     */
    public function sendNewProductEmail(ProductInterface $product)
    {
        $this->send($message);
    }

    /**
     * Send message by Mailer
     *
     * @param $message
     */
    public function send($message)
    {
        return true;
    }
}
