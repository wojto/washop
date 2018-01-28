<?php

namespace Shop\Infrastructure\Repository\Doctrine;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Shop\Domain\Model\UserId;
use Shop\Domain\Model\UserInterface;
use Shop\Domain\Repository\UserRepositoryInterface;

/**
 * Doctrine implementation of user repository
 *
 * @package Shop\Infrastructure\Repository\Doctrine
 */
class UserRepository extends DocumentRepository implements UserRepositoryInterface
{
    /**
     * Return user from database
     *
     * @param  UuidInterface $id
     * @return null|object
     */
    public function getById(UserId $id)
    {
        return $this->find($id);
    }

    /**
     * Save user in database
     *
     * @param UserInterface $user
     */
    public function save(UserInterface $user)
    {
        $this->_em->persist($user);
        $this->_em->flush($user);
    }

    /**
     * Search by criteria
     *
     * @param  $params Search params
     * @param  $orderBy Sort params
     * @return \Doctrine\ORM\Query
     */
    public function getUsers($params = array(), $orderBy = array())
    {
        // prepare sort params
        if (empty($orderBy)) {
            $orderBy = array(
                'field' => 'id',
                'asc' => 'asc'
            );
        }

        switch ($orderBy['field']) {
            case 'addedAt':
                $orderByField = 'addedAt';
                break;
            case 'id':
            default:
                $orderByField = 'id';
                break;
        }

        $query = $this->createQueryBuilder('u')
            ->sort($orderByField, $orderBy['asc']);

        return $query
            ->getQuery();
    }
}
