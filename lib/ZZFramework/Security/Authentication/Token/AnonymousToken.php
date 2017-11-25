<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Security\Authentication\Token;


class AnonymousToken extends Token
{
    public function setUser($user)
    {
        return;
    }

    public function setRoles(array $roles)
    {
        return;
    }

    public function isAuthenticated()
    {
        return false;
    }
}