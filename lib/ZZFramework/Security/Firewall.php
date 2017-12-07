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


use ZZFramework\Event\EventSubscriberInterface;
use ZZFramework\Http\Event\GetResponseEvent;
use ZZFramework\Http\Event\GetResponseForExceptionEvent;
use ZZFramework\Http\Event\HttpEvents;
use ZZFramework\Http\RedirectResponse;
use ZZFramework\Http\Response;
use ZZFramework\Security\Authentication\Token\Token;
use ZZFramework\Security\Exception\AccessDeniedException;

class Firewall implements FirewallInterface, EventSubscriberInterface
{
    /**
     * @var Token
     */
    private $token;

    private $authenticators;

    /**
     * Firewall constructor.
     * @param $authenticators
     */
    public function __construct($authenticators)
    {
        $this->authenticators = $authenticators;
    }


    public function handle(GetResponseEvent $event, $eventName, $dispatcher)
    {
        $request = $event->getRequest();
        foreach ($this->authenticators as $authenticator) {
            $token = $authenticator->authenticate($request);
            if($token) {
                $this->setToken($token);
                break;
            }
        }
    }

    public function authenticateException(GetResponseForExceptionEvent $event, $eventName, $dispatcher) {
        if (!$event->getException() instanceof AccessDeniedException) {
            return;
        }

        if ($this->token && $this->token->isAuthenticated()) {
            $event->setResponse(new Response("Access Denied!", Response::HTTP_FORBIDDEN));
        }

        $event->setResponse(new RedirectResponse('/login'));
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param mixed $authenticators
     */
    public function setAuthenticators(array $authenticators)
    {
        $this->authenticators = $authenticators;
    }


    public function getObservedEvents()
    {
        return array(
            HttpEvents::REQUEST => "handle",
            HttpEvents::EXCEPTION => "authenticateException"
        );
    }
}