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


class Token
{
    protected $user;

    protected $roles;

    public function setUser($user) {
        $this->user = $user;
    }

    public function setRoles(array $roles) {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function isAuthenticated() {
        return isset($this->user) && isset($this->roles);
    }
}