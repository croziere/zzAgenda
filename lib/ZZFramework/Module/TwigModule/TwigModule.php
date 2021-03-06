<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\TwigModule;


use ZZFramework\Application\Module\Module;

class TwigModule extends Module
{
    public function boot()
    {
        $listener = $this->container->get('twig.env.listener');
        $dispatcher = $this->container->get('event_dispatcher');

        $dispatcher->subscribeObservers($listener);
    }
}
