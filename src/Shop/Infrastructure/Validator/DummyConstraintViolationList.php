<?php

namespace Shop\Infrastructure\Validator;

use Shop\Domain\Validator\ConstraintViolationListInterface;

/**
 * Dummy violation list
 *
 * @package Shop\Infrastructure\Validator
 */
class DummyConstraintViolationList implements ConstraintViolationListInterface
{
    /**
     * Returning number of errors
     *
     * @return int
     */
    public function count()
    {
        return 0;
    }
}
