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


class EventDispatcher implements EventDispatcherInterface
{

    protected $observers = array();

    public function dispatch($eventName, Event $event = null)
    {
        if (null === $event) {
            $event = new Event();
        }

        if($this->hasObservers($eventName)) {
            $this->notify($this->getObservers($eventName), $eventName, $event);
        }

        return $event;
    }

    public function addObserver($eventName, $callback)
    {
        $this->observers[$eventName][] = $callback;
    }

    public function removeObserver($eventName, $callback)
    {
        if(!isset($this->observers[$eventName])) {
            return;
        }

        foreach ($this->observers as $key => $cb) {
            if($cb === $callback) {
                unset($this->observers[$eventName][$key]);
            }
        }
    }

    public function subscribeObservers(EventSubscriberInterface $subscriber)
    {
        foreach ($subscriber->getObservedEvents() as $eventName => $params) {
            if(is_string($params)) {
                $this->addObserver($eventName, array($subscriber, $params));
            } else {
                foreach ($params as $cb) {
                    $this->addObserver($eventName, array($subscriber, $cb));
                }
            }
        }
    }

    public function unsubscribeObservers(EventSubscriberInterface $subscriber)
    {
        // TODO: Implement unsubscribeObservers() method.
    }

    public function getObservers($eventName)
    {
        if(!isset($this->observers[$eventName])) {
            return array();
        }

        return $this->observers[$eventName];
    }

    public function hasObservers($eventName)
    {
        return (bool) count($this->getObservers($eventName));
    }

    protected function notify($observers, $eventName, Event $event) {
        foreach ($observers as $observer) {
            call_user_func($observer, $event, $eventName, $this);
            if($event->isStopped()) {
                break;
            }
        }
    }
}