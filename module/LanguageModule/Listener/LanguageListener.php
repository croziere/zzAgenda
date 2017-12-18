<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 18:47
 */


namespace LanguageModule\Listener;

use LanguageModule\Translator;
use ZZFramework\Event\EventSubscriberInterface;
use ZZFramework\Http\Event\GetResponseEvent;
use ZZFramework\Http\Event\HttpEvents;
use ZZFramework\Http\Request;

class LanguageListener implements EventSubscriberInterface
{
    private $locale;

    public function getLocale() {
        return $this->locale;
    }

    public function handleRequest(GetResponseEvent $event, $eventName, $router) {
        $req = $event->getRequest();

        if($req->session->has('lang')) {
            $lang = $req->session->get('lang');
        } else {
            $lang = $this->getUserLang($req);
        }

        $this->locale = $lang ? $lang : 'en';
    }

    /**
     * Auto detect lang used in browser (encapsulated in request obj)
     * @param request Request containing browser settings
     * @return string
     */
    private function getUserLang($request) {
        return substr($request->server->get('HTTP_ACCEPT_LANGUAGE'),0,2);
    }

    public function getObservedEvents()
    {
        return array(
            HttpEvents::REQUEST => 'handleRequest'
        );
    }
}