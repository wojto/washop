<?php

namespace Shop\Domain\Model;

use Shop\Domain\Model\ValueObject\Email;
use Symfony\Component\Security\Core\User\UserInterface as UserSecurityInterface;

/**
 * User class
 */
class User implements UserInterface, UserSecurityInterface, \Serializable
{
    /**
     * @var UserId
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $algorithm = 'sha1';

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $addedAt;

    /**
     * User constructor.
     *
     * @param UserId                   $id
     * @param \Shop\Domain\Model\Email $email
     * @param string                   $algorithm
     * @param string                   $salt
     * @param string                   $password
     * @param \DateTime                $addedAt
     */
    public function __construct(
        UserId $id,
        Email $email,
        string $algorithm,
        string $salt,
        string $password,
        \DateTime $addedAt
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->algorithm = $algorithm;
        $this->salt = $salt;
        $this->password = $password;
        $this->addedAt = $addedAt;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get algorithm
     *
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * Get salt
     *
     * @return string|null
     */
    public function getSalt()//: ?string
    {
        return $this->salt;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get addedAt
     *
     * @return \DateTime
     */
    public function getAddedAt(): \DateTime
    {
        return $this->addedAt;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * Return user roles
     *
     * @return array
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Clear user credentials
     */
    public function eraseCredentials()
    {
    }

    /**
     * Serialize user data
     *
     * @return string
     * @see    \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(
            array(
                $this->id,
                $this->email,
                $this->password,
            )
        );
    }

    /**
     * Unserialize user data
     *
     * @param string $serialized
     * @see   \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list ($this->id, $this->email, $this->password) = unserialize($serialized);
    }
}
