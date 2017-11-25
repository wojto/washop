<?php

namespace Shop\Domain\Model;

use Ramsey\Uuid\Uuid;

/**
 * Class ProductId for Product identifiers
 *
 * @package Shop\Domain\Model
 */
class ProductId
{
    /**
     * @var string
     */
    private $id;

    /**
     * ProductId constructor.
     *
     * @param string|null $id
     */
    public function __construct(string $id = null)
    {
        $this->id = $id === null ? Uuid::uuid4()->toString() : $id;
    }

    /**
     * Return string representation
     *
     * @return null|string
     */
    public function asString()
    {
        return $this->id;
    }

    /**
     * Return id
     *
     * @return null|string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Check if ids are equals
     *
     * @param  ProductId $productId
     * @return bool
     */
    public function equals(ProductId $productId)
    {
        return $this->id() === $productId->id();
    }

    /**
     * Return string representation
     *
     * @return null|string
     */
    public function __toString()
    {
        return $this->id;
    }
}
