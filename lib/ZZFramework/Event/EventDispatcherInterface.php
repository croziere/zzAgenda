<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Event;


interface EventDispatcherInterface
{
    public function dispatch($eventName, Event $event = null);

    public function addObserver($eventName, $callback);

    public function removeObserver($eventName, $callback);

    public function subscribeObservers(EventSubscriberInterface $subscriber);

    public function unsubscribeObservers(EventSubscriberInterface $subscriber);

    public function getObservers($eventName);

    public function hasObservers($eventName);
}