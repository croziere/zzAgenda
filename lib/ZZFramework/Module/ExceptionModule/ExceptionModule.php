<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\ExceptionModule;


use ZZFramework\Application\Module\Module;

class ExceptionModule extends Module
{
    public function boot()
    {
        $subscriber = $this->container->get('exception.subscriber');

        $this->container->get('event_dispatcher')->subscribeObservers($subscriber);
    }
}