<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http;


use ZZFramework\Event\EventDispatcherInterface;
use ZZFramework\Http\Controller\ControllerResolverInterface;
use ZZFramework\Http\Event\BeforeSendResponseEvent;
use ZZFramework\Http\Event\ControllerResolvedEvent;
use ZZFramework\Http\Event\GetResponseEvent;
use ZZFramework\Http\Event\GetResponseFromResultEvent;
use ZZFramework\Http\Event\HttpEvents;

class HttpProcessor implements HttpProcessorInterface
{
    private $eventDispatcher;
    private $resolver;

    /**
     * HttpProcessor constructor.
     * @param $eventDispatcher
     * @param $resolver
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, ControllerResolverInterface $resolver)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->resolver = $resolver;
    }


    public function handle(Request $request): Response
    {
        try {
            return $this->handleUserRequest($request);
        }
        catch (\Exception $e) {
            return $this->handleException($e, $request);
        }
    }

    private function handleUserRequest($request)
    {
        $event = new GetResponseEvent($request, $this);
        $this->eventDispatcher->dispatch(HttpEvents::REQUEST, $event);

        if($event->hasResponse()) {
            return $this->beforeSend($event->getResponse(), $request);
        }

        $controller = $this->resolver->getController($request);
        if(!$controller) {
            throw new \Exception("Controller not found!");
        }

        $event = new ControllerResolvedEvent($request, $this, $controller);
        $this->eventDispatcher->dispatch(HttpEvents::CONTROLLER, $event);
        $controller = $event->getController();

        $arguments = $this->resolver->getArguments($request, $controller);

        $response = call_user_func_array($controller, $arguments);

        if(!$response instanceof Response) {
            $event = new GetResponseFromResultEvent($request, $this, $response);
            $this->eventDispatcher->dispatch(HttpEvents::RESPONSE, $event);

            if($event->hasResponse()) {
                $response = $event->getResponse();
            }

            if(!$response instanceof Response) {
                $err = sprintf("The controller MUST return a Response!");
                if(null === $response) {
                    $err .= ' Did you forget to add a return statement?';
                }
                throw new \LogicException($err);
            }
        }

        return $this->beforeSend($response, $request);
    }

    private function handleException($e, Request $request)
    {
        $response = new Response();
        $response->setContent("Oops, exception! : ".$e);
        return $response;
    }

    private function beforeSend($response, $request)
    {
        $event = new BeforeSendResponseEvent($request, $this, $response);
        $this->eventDispatcher->dispatch(HttpEvents::TERMINATE, $event);

        return $event->getResponse();
    }
}