<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserModule\Repository;


use JSONFileDB\Components\Repository\Repository;
use UserModule\Entity\User;
use ZZFramework\Security\User\UserInterface;
use ZZFramework\Security\User\UserProviderInterface;

class UserRepository extends Repository implements UserProviderInterface
{

    /**
     * @param $username
     * @return UserInterface|null
     */
    public function loadUserByUsername($username)
    {
        $user = new User();
        $user->setUsername("Francis");
        $user->setPassword("test");
        $user->setIsAdmin(false);
        $user->setSalt("truc");
        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        return $user;
    }

    public function findOneBy(array $criteria)
    {
        // TODO: Implement findOneBy() method.
    }

    public function getClassName()
    {
        return User::class;
    }
}