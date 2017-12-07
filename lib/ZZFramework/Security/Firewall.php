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
use ZZFramework\Http\Event\HttpEvents;

class Firewall implements FirewallInterface, EventSubscriberInterface
{
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


    public function handle(GetResponseEvent $event, $eventName, $router)
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
        return array(HttpEvents::REQUEST => "handle");
    }
}