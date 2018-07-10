<?php

namespace Shop\Infrastructure\Transport;

use Shop\Domain\Model\ProductInterface;
use Shop\Domain\Transport\MailerInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

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
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var TwigEngine
     */
    private $twig;

    /**
     * Mailer constructor.
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $twig
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    /**
     * @param ProductInterface $product
     * @throws \Twig\Error\Error
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function sendNewProductEmail(ProductInterface $product)
    {
        // preparing and sending e-mail
        $message = (new \Swift_Message('Dodano nowy produkt do bazy'))
            ->setFrom('codesensus@gmail.com')
            ->setTo('fake@example.com')
            ->setBody(
                $this->twig->render('admin/product/newProductEmail.txt.twig', array('product' => $product))
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
