<?php

namespace Shop\Domain\Model;

use Shop\Domain\Model\ProductInterface;
use Shop\Domain\Model\User;
use Money\Money;
use Money\Currency;

/**
 * Product class
 */
class Product implements ProductInterface
{
    /**
     * @var ProductId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $priceAmount;

    /**
     * @var string
     */
    private $priceCurrency;

    /**
     * @var \DateTime
     */
    private $addedAt;

    /**
     * @var User
     */
    private $user;

    /**
     * Product constructor.
     *
     * @param ProductId               $id
     * @param string                  $name
     * @param string                  $description
     * @param Money                   $price
     * @param \DateTime               $addedAt
     * @param \Shop\Domain\Model\User $user
     */
    public function __construct(
        ProductId $id,
        string $name,
        string $description,
        Money $price,
        \DateTime $addedAt,
        User $user
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->setPrice($price);
        $this->addedAt = $addedAt;
        $this->user = $user;
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
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * get Money
     *
     * @return Money|null
     */
    public function getPrice(): Money
    {
        // return null if there is no currency set
        if (!$this->priceCurrency) {
            return null;
        }

        // return zero if amount isn't set
        if (!$this->priceAmount) {
            return new Money(0, new Currency($this->priceCurrency));
        }

        // return Money value object
        return new Money($this->priceAmount, new Currency($this->priceCurrency));
    }

    /**
     * Set price
     *
     * @param  Money $price
     * @return ProductInterface
     */
    public function setPrice(Money $price): ProductInterface
    {
        $this->priceAmount = $price->getAmount();
        $this->priceCurrency = $price->getCurrency()->getCode();

        return $this;
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
     * Get user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
