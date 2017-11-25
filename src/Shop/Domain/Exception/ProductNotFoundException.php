<?php

namespace Shop\Domain\Exception;

use Shop\Domain\Model\ProductId;

/**
 * Class ProductNotFoundException
 *
 * @package Shop\Domain\Exception
 */
class ProductNotFoundException extends \RuntimeException
{
    /**
     * Throw not found exception for specified product
     *
     * @param  ProductId $id
     * @return ProductNotFoundException
     */
    public static function forId(ProductId $id)
    {
        return new self(
            sprintf(
                'Produkt o identyfikatorze: %s nie istnieje',
                $id
            )
        );
    }
}
