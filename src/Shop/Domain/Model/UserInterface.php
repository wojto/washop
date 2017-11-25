<?php

namespace Shop\Domain\Model;

use Shop\Domain\Model\ValueObject\Email;

/**
 * Interface for User class
 *
 * @package Shop\Domain\Model
 */
interface UserInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getAlgorithm(): string;

    /**
     * @return string|null
     */
    public function getSalt();//: ?string;

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @return \DateTime
     */
    public function getAddedAt(): \DateTime;
}
