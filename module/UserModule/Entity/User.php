<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserModule\Entity;


use ZZFramework\Security\User\UserInterface;

class User implements UserInterface
{
    /**
     * @Mapped
     */
    private $id;

    /**
     * @Mapped
     */
    private $username;

    /**
     * @Mapped
     */
    private $email;

    /**
     * @Mapped
     */
    private $password;

    /**
     * @Mapped
     */
    private $salt;

    /**
     * @Mapped
     */
    private $isAdmin;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getRoles()
    {
        if ($this->isAdmin) {
            return array("ROLE_USER", "ROLE_ADMIN");
        }
        else {
            return array("ROLE_USER");
        }
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

}