<?php

namespace Shop\Infrastructure\Transport;

use Shop\Domain\Model\ProductInterface;
use Shop\Domain\Transport\MailerInterface;

/**
 * Class Mailer for sending e-mails
 *
 * @package Shop\Infrastructure\Transport
 */
class Mailer implements MailerInterface
{
    /**
     * Used mailer
     *
     * @var Swift_Mailer|\Swift_Mailer
     */
    private $mailer;

    /**
     * Mailer constructor
     *
     * @param $mailer Swift_Mailer
     * @param $twig TwigEngine
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    /**
     * @param Product $product
     */
    public function sendNewProductEmail(ProductInterface $product)
    {
        // preparing and sending e-mail
        $message = \Swift_Message::newInstance()
            ->setSubject('Dodano nowy produkt do bazy')
            ->setFrom('codesensus@gmail.com')
            ->setTo('fake@example.com')
            ->setBody(
                $this->twig->render('AdminBundle:product:newProductEmail.txt.twig', array('product' => $product))
            );

        $this->send($message);
    }

    /**
     * Send message by Mailer
     *
     * @param $message
     */
    public function send($message)
    {
        $this->mailer->send($message);
    }
}
