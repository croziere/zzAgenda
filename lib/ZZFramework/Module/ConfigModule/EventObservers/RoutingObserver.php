<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\ConfigModule\EventObservers;


use ZZFramework\Event\EventSubscriberInterface;
use ZZFramework\Http\Event\GetResponseEvent;
use ZZFramework\Http\Event\HttpEvents;
use ZZFramework\Routing\RouterInterface;

class RoutingObserver implements EventSubscriberInterface
{
    private $router;

    /**
     * RoutingObserver constructor.
     * @param $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onRequest(GetResponseEvent $event, $eventName, $router) {
        $request = $event->getRequest();
        if($request->attributes->has('_controller')) {
            return;
        }

        $params = $this->router->match($request->getPath());
        if(false === $params) {
            throw new \Exception(sprintf("No routes found for %s", $request->getPath()));
        }
        $request->attributes->merge($params);
    }


    public function getObservedEvents()
    {
        return array(HttpEvents::REQUEST => "onRequest");
    }
}