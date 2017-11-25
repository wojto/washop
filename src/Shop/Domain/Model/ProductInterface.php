<?php

namespace Shop\Domain\Model;

use Shop\Domain\Model\User;
use Money\Money;

/**
 * Interface for Product class
 *
 * @package Shop\Domain\Model
 */
interface ProductInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return Money
     */
    public function getPrice(): Money;

    /**
     * @return \DateTime
     */
    public function getAddedAt(): \DateTime;

    /**
     * @return User
     */
    public function getUser(): User;
}
