<?php

namespace Shop\Domain\Exception;

use Shop\Domain\Model\ProductId;

/**
 * Class InvalidProductException
 *
 * @package Shop\Domain\Exception
 */
class InvalidProductException extends \DomainException
{
    /**
     * Throw exception for specified product
     *
     * @param  ProductId $id
     * @return InvalidProductException
     */
    public static function forId(ProductId $id)
    {
        return new self(
            sprintf(
                'Niepoprawny produkt o identyfikatorze: %s',
                $id
            )
        );
    }
}
