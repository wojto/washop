<?php

namespace Shop\Infrastructure\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Shop\Domain\Model\ProductId;
use Shop\Domain\Model\ProductInterface;
use Shop\Domain\Repository\ProductRepositoryInterface;

/**
 * Doctrine implementation of product repository
 *
 * @package Shop\Infrastructure\Repository\Doctrine
 */
class ProductRepository extends EntityRepository implements ProductRepositoryInterface
{
    /**
     * Return product from database
     *
     * @param  UuidInterface $id
     * @return null|object
     */
    public function getById(ProductId $id)
    {
        return $this->find($id);
    }

    /**
     * Save product in database
     *
     * @param ProductInterface $product
     */
    public function save(ProductInterface $product)
    {
        $this->_em->persist($product);
        $this->_em->flush($product);
    }

    /**
     * Search by criteria
     *
     * @param  $params Search params
     * @param  $orderBy Sort params
     * @return \Doctrine\ORM\Query
     */
    public function getProducts($params = array(), $orderBy = array())
    {
        // prepare sort params
        if (empty($orderBy)) {
            $orderBy = array(
                'field' => 'id',
                'asc' => 'asc'
            );
        }

        switch ($orderBy['field']) {
            case 'id':
                $orderByField = 'p.id';
                break;
            case 'addedAt':
            default:
                $orderByField = 'p.addedAt';
                break;
        }

        $query = $this
            ->createQueryBuilder('p')
            ->orderBy($orderByField, $orderBy['asc']);

        return $query
            ->getQuery();
    }
}
