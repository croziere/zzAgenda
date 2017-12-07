<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Security\User;


interface UserProviderInterface
{
    /**
     * @param $username
     * @return UserInterface|null
     */
    public function loadUserByUsername($username);

    public function refreshUser(UserInterface $user);

    /**
     * @param $class
     * @return bool
     */
    public function supportsClass($class);
}