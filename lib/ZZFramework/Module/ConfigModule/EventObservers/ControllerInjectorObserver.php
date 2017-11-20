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


use ZZFramework\DependencyInjection\ContainerAwareInterface;
use ZZFramework\DependencyInjection\ContainerInterface;
use ZZFramework\Event\EventSubscriberInterface;
use ZZFramework\Http\Event\ControllerResolvedEvent;
use ZZFramework\Http\Event\HttpEvents;

class ControllerInjectorObserver implements EventSubscriberInterface
{
    private $container;

    /**
     * ControllerInjectorObserver constructor.
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onResolved(ControllerResolvedEvent $event, $eventName, $router) {
        $controller = $event->getController();
        if(!is_array($controller)) {
            return;
        }

        if(!$controller[0] instanceof ContainerAwareInterface) {
            return;
        }

        $ctlr = new $controller[0];
        $ctlr->setContainer($this->container);
        $controller = array($ctlr, $controller[1]);
        $event->setController($controller);
    }


    public function getObservedEvents()
    {
        return array(HttpEvents::CONTROLLER => "onResolved");
    }
}