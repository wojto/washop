<?php

declare(strict_types=1);

namespace Shop\Domain\Repository;

use Shop\Domain\Model\ProductId;
use Shop\Domain\Model\ProductInterface;

/**
 * Interface ProductRepositoryInterface
 *
 * @package Shop\Domain\Repository
 */
interface ProductRepositoryInterface
{
    /**
     * Return single product
     *
     * @param  ProductId $id
     * @return mixed
     */
    public function getById(ProductId $id);

    /**
     * Save product
     *
     * @param  ProductInterface $product
     * @return mixed
     */
    public function save(ProductInterface $product);

    /**
     * Return list of products
     *
     * @return mixed
     */
    public function getProducts();
}
