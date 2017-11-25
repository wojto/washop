<?php

namespace Shop\Infrastructure\Validator;

use Shop\Domain\Validator\ValidatorInterface;
use Symfony\Component\Validator\Validation;

/**
 * Satisfied implementation of Validator
 *
 * @package Shop\Infrastructure\Validator
 */
class YmlValidator implements ValidatorInterface
{
    /**
     * Validate value
     *
     * @param  $value
     */
    public function validate($value)
    {
        $validator = Validation::createValidatorBuilder()
            ->addYamlMapping(__DIR__.'/../../../AdminBundle/Resources/config/validation.yml')
            ->getValidator();

        return $validator->validate($value);
    }
}
