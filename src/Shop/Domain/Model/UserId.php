<?php

namespace Shop\Domain\Model;

use Ramsey\Uuid\Uuid;

/**
 * Class UserId for User identifiers
 *
 * @package Shop\Domain\Model
 */
class UserId
{
    /**
     * @var string
     */
    private $id;

    /**
     * UserId constructor.
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
     * @param  UserId $userId
     * @return bool
     */
    public function equals(UserId $userId)
    {
        return $this->id() === $userId->id();
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
