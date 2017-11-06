<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\ConfigModule;


use ZZFramework\Application\Module\Module;

class ConfigModule extends Module
{
    public function boot()
    {
        $routingObserver = $this->container->get('routing.observer');
        $ctlrObserver = $this->container->get('controller.injector');
        $dispatcher = $this->container->get('event_dispatcher');

        $dispatcher->subscribeObservers($routingObserver);
        $dispatcher->subscribeObservers($ctlrObserver);
    }

}