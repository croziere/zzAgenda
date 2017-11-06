<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\ExceptionModule\ContainerServices;


use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\Definition;
use ZZFramework\DependencyInjection\Injectable\Reference;

class ExceptionContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $exceptionDef = new Definition('\ZZFramework\Module\ExceptionModule\EventObservers\ExceptionSubscriber');
        $exceptionDef->addArgument(new Reference('templating'));

        $container->set('exception.subscriber', $exceptionDef);
    }
}