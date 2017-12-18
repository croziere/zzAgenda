<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Security\Authentication\Handler;


use ZZFramework\Http\Request;
use ZZFramework\Security\Authentication\Token\AuthenticatedToken;
use ZZFramework\Security\User\UserProviderInterface;

class SessionAuthenticationHandler implements AuthenticationHandlerInterface
{
    private $userProvider;

    /**
     * SessionAuthenticationHandler constructor.
     * @param $userProvider UserProviderInterface
     */
    public function __construct($userProvider)
    {
        $this->userProvider = $userProvider;
    }


    public function authenticate(Request $request)
    {
        if(!$request->session->has('_username')) {
            return;
        }

        $user = $this->userProvider->loadUserByUsername($request->session->get('_username'));
        if(!$user) {
            return;
        }

        $token = new AuthenticatedToken();
        $token->setUser($user);
        $token->setRoles($user->getRoles());

        return $token;
    }
}