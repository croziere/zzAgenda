<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\SecurityModule;


use ZZFramework\Application\Module\Module;

class SecurityModule extends Module
{
    public function boot()
    {
        $authenticators = array(
            $this->container->get('security.handler.form'),
            $this->container->get('security.handler.session'),
            $this->container->get('security.handler.anon')
        );
        $this->container->get('firewall')->setAuthenticators($authenticators);

        $dispatcher = $this->container->get('event_dispatcher');

        $dispatcher->subscribeObservers($this->container->get('firewall'));
    }
}