<?php

namespace Shop\Domain\Command;

use Money\Money;
use Shop\Domain\Model\ProductId;
use Shop\Domain\Model\UserInterface;

/**
 * Command to add new product
 *
 * @package Shop\Domain\Command
 */
class NewProductCommand
{
    /**
     * @var ProductId
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var Money
     */
    public $price;

    /**
     * @var \DateTime
     */
    public $addedAt;

    /**
     * @var UserInterface
     */
    public $user;
}
