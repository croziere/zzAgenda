<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 17:51
 */

namespace EventModule\User;

class User
{
    private $username;
    private $password;
    private $salt;
    private $roles;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $salt
     * @param $roles
     */
    public function __construct($username, $password, $salt, $roles)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return array string
     *
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     *
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }



}