<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Security;


use ZZFramework\Security\Authentication\Token\Token;
use ZZFramework\Security\User\UserInterface;

/**
 * Class Security
 * Convenient facade to use the security system
 * @package ZZFramework\Security
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
final class Security
{
    /**
     * @var Firewall
     */
    private $firewall;

    /**
     * Security constructor.
     * @param Firewall $firewall
     */
    public function __construct(Firewall $firewall)
    {
        $this->firewall = $firewall;
    }

    /**
     * Return the currently connected user or null
     * @return UserInterface|null
     */
    public function getUser() {
        if (!$token = $this->getToken()) {
            return null;
        }

        $user = $token->getUser();
        if (!is_object($user)) {
            return null;
        }

        return $user;
    }

    /**
     * Returns true whether the user is granted the role $role
     * @param $role
     * @return bool
     */
    public function isGranted($role) {
        $granted = false;
        $user =  $this->getUser();

        if ($user) {
            $granted = in_array($role, $user->getRoles());
        }

        return $granted;
    }

    /**
     * @return Token
     */
    public function getToken()
    {
        return $this->firewall->getToken();
    }

    /**
     * @return mixed|null
     */
    public function getLastAuthenticationError() {
        $request = $this->firewall->getRequest();
        $session = $request->session;

        $authenticationException = null;

        if ($session->has('_security_exception')) {
            $authenticationException = $session->get('_security_exception');
            unset($_SESSION['_security_exception']);
        }

        return $authenticationException;
    }

    /**
     * Returns the last used username
     * @return string
     */
    public function getLastUsername() {
        $request = $this->firewall->getRequest();
        $session = $request->session;

        $username = '';

        if ($session->has('_security_last_username')) {
            $username = $session->get('_security_last_username');
            unset($_SESSION['_security_last_username']);
        }

        return $username;
    }


}