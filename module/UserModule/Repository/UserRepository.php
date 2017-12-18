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
     * @param string $username Actually uses email
     * @return UserInterface|null
     */
    public function loadUserByUsername($username)
    {
        $param = sprintf("e.username == '%s'", filter_var($username, FILTER_SANITIZE_STRING));

        return $this->findOneBy(array($param));
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->find($user->getId());
    }

    public function getClassName()
    {
        return User::class;
    }
}