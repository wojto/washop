<?php

namespace Shop\Infrastructure\Repository;

use Shop\Domain\Exception\ProductNotFoundException;
use Shop\Domain\Model\ProductId;
use Shop\Domain\Model\ProductInterface;
use Shop\Domain\Repository\ProductRepositoryInterface;

/**
 * In memory implementation of product repository
 *
 * @package Shop\Infrastructure\Repository
 */
class InMemoryProductsRepository implements ProductRepositoryInterface
{
    /**
     * Array of products
     *
     * @var array
     */
    private $products = [];

    /**
     * Return single product
     *
     * @param  UuidInterface $id
     * @return ProductInterface
     */
    public function getById(ProductId $id): ProductInterface
    {
        if (!array_key_exists((string)$id, $this->products)) {
            // product not found, throw exception
            throw ProductNotFoundException::forId($id);
        }

        return $this->products[(string)$id];
    }

    /**
     * Save product
     *
     * @param ProductInterface $product
     */
    public function save(ProductInterface $product)
    {
        $this->products[(string)$product->getId()] = $product;
    }

    /**
     * Get list of products
     *
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }
}
