<?php

namespace Shop\Domain\Validator;

/**
 * Interface for command validator
 *
 * @package Shop\Domain\Validator
 */
interface ValidatorInterface
{
    /**
     * Validate value
     *
     * @param  $value
     * @return mixed
     */
    public function validate($value);
}
