<?php

namespace Shop\Infrastructure\Validator;

use Shop\Domain\Validator\ValidatorInterface;
use Shop\Infrastructure\Validator\DummyConstraintViolationList;

/**
 * Satisfied implementation of Validator
 *
 * @package Shop\Infrastructure\Validator
 */
class SatisfiedValidator implements ValidatorInterface
{
    /**
     * Validate value
     *
     * @param  $value
     * @return \Shop\Infrastructure\Validator\DummyConstraintViolationList
     */
    public function validate($value)
    {
        return new DummyConstraintViolationList();
    }
}
