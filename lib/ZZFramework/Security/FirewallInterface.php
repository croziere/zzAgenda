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


use ZZFramework\Http\Event\GetResponseEvent;

interface FirewallInterface
{
    public function handle(GetResponseEvent $event, $eventName, $router);
}