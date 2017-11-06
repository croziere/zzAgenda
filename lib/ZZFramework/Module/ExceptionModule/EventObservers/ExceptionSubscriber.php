<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\ExceptionModule\EventObservers;


use ZZFramework\Event\EventSubscriberInterface;
use ZZFramework\Http\Event\GetResponseForExceptionEvent;
use ZZFramework\Http\Event\HttpEvents;
use ZZFramework\Http\Response;

class ExceptionSubscriber implements EventSubscriberInterface
{
    private $templating;

    /**
     * ExceptionSubscriber constructor.
     * @param $templating
     */
    public function __construct(\Twig_Environment $templating)
    {
        $this->templating = $templating;
    }


    public function onException(GetResponseForExceptionEvent $event, $eventName) {
        $exception = $event->getException();

        $response = new Response();

        $response->setContent($this->templating->render('exception.html.twig', array(
            'exception' => $exception
        )));

        $event->setResponse($response);
    }

    public function getObservedEvents()
    {
        return array(HttpEvents::EXCEPTION => "onException");
    }
}