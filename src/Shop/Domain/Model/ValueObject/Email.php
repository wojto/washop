<?php

namespace Shop\Domain\Model\ValueObject;

/**
 * Email value object
 *
 * @package Shop\Domain\Model\ValueObject
 */
final class Email
{
    /**
     * @var string Store e-mail
     */
    private $email;

    /**
     * Email constructor.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        // check if e-mail is correct
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            // wrong e-mail throw exception
            throw new \InvalidArgumentException(sprintf('Email with value "%s" is not valid', $email));
        }
    }

    /**
     * Return e-mail address
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Return e-mail address as string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }
}
