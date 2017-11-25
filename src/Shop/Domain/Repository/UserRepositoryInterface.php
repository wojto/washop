<?php

declare(strict_types=1);

namespace Shop\Domain\Repository;

use Shop\Domain\Model\UserId;
use Shop\Domain\Model\UserInterface;

/**
 * Interface UserRepositoryInterface
 *
 * @package Shop\Domain\Repository
 */
interface UserRepositoryInterface
{
    /**
     * Return single user
     *
     * @param  UuidInterface $id
     * @return mixed
     */
    public function getById(UserId $id);

    /**
     * Save user
     *
     * @param  UserInterface $user
     * @return mixed
     */
    public function save(UserInterface $user);

    /**
     * Return list of users
     *
     * @return mixed
     */
    public function getUsers();
}
