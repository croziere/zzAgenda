<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EventModule\ContainerServices;


use EventModule\Repository\EventRepository;
use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;

class EventContainerRegister implements ContainerRegisterInterface
{

    /**
     * @inheritdoc
     */
    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $eventRepo = new EventRepository();

        $container->set('repository.event', $eventRepo);
    }
}