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

/**
 * Class Security
 * Convenient facade to use the security system
 * @package ZZFramework\Security
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
final class Security
{
    private $container;

    /**
     * Security constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

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

    public function isGranted($role) {

    }

    /**
     * @return Token
     */
    public function getToken()
    {
        return $this->container->get('firewall')->getToken();
    }


}