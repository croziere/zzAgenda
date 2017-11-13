<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\ConfigModule\ContainerServices;


use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\Definition;
use ZZFramework\DependencyInjection\Injectable\Reference;
use ZZFramework\Event\EventDispatcher;
use ZZFramework\Routing\Router;

class ConfigContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $httpProcessorDef = new Definition('ZZFramework\Http\HttpProcessor');
        $httpProcessorDef
            ->addArgument(new Reference('event_dispatcher'))
            ->addArgument(new Reference('controller_resolver'));

        $resolverDef = new Definition('ZZFramework\Http\Controller\ControllerResolver');

        $routingObserverDef = new Definition('ZZFramework\Module\ConfigModule\EventObservers\RoutingObserver');
        $routingObserverDef->addArgument(new Reference('router'));

        $controllerInjectorDef = new Definition('ZZFramework\Module\ConfigModule\EventObservers\ControllerInjectorObserver');
        $controllerInjectorDef->addArgument(new Reference('container'));

        $container->set('router', new Router());
        $container->set('event_dispatcher', new EventDispatcher());

        $container->register('http_processor', $httpProcessorDef);
        $container->register('controller_resolver', $resolverDef);
        $container->register('routing.observer', $routingObserverDef);
        $container->register('controller.injector', $controllerInjectorDef);
    }
}