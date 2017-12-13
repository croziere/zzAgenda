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
use ZZFramework\Security\Exception\AuthenticationException;
use ZZFramework\Security\User\UserProviderInterface;

class FormAuthenticationHandler implements AuthenticationHandlerInterface
{
    /**
     * @var UserProviderInterface
     */
    protected $userProvider;

    /**
     * FormAuthenticationHandler constructor.
     * @param UserProviderInterface $userProvider
     */
    public function __construct(UserProviderInterface $userProvider)
    {
        $this->userProvider = $userProvider;
    }


    /**
     * @param Request $request
     * @return AuthenticatedToken
     * @throws \Exception
     */
    public function authenticate(Request $request)
    {
        if (!$request->request->has('_username') || !$request->request->has('_password')) {
            return;
        }

        $username = $request->request->get('_username');
        $rawPassword = $request->request->get('_password');



        $user = $this->userProvider->loadUserByUsername($username);
        if(!$user) {
            $e = new AuthenticationException();
            $this->setLastUsed($e, $username);
            throw new $e;
        }


        if (!password_verify($rawPassword, $user->getPassword())) {
            $e = new AuthenticationException();
            $this->setLastUsed($e, $username);
            throw new $e;
        }

        $token = new AuthenticatedToken();

        $token->setUser($user);
        $token->setRoles($user->getRoles());

        $_SESSION["_username"] = $user->getUsername();

        return $token;
    }

    private function setLastUsed(AuthenticationException $e, $username) {
        $_SESSION['_security_last_username'] = $username;
        $_SESSION['_security_exception'] = $e;
    }
}