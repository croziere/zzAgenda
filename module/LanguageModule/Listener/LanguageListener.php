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
    private $container;

    /**
     * LanguageListener constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }


    public function getObservedEvents()
    {
        return array(
          HttpEvents::REQUEST => 'handleRequest'
        );
    }

    public function handleRequest(GetResponseEvent $event,$eventName,$router){
        $req= $event->getRequest();
        if($req->session->has('lang')) {
            $lang = $req->session->get('lang');
        }
        else {
            $lang = $this->getUserLang($req);
        }
        try { // lang might not exist (user has browser lang not supported OR session has invalid lang)
            $messages_array = require($lang . ".php");
        }
        catch(\ErrorException $ex){ // use english (en.php) as default language
            // TODO : display error while loading above $lang : NOT SUPPORTED LANGUAGE, USING ENGLISH AS DEFAULT
            $messages_array = require("en.php");
        }
        $translator = new Translator($messages_array); // building matching translator
        $this->container->set('translator',$translator); // injecting translator into container
    }

    /**
     * Auto detect lang used in browser (encapsulated in request obj)
     * @param request Request containing browser settings
     * @return string
     */
    private function getUserLang($request){
        return substr($request->server->get('HTTP_ACCEPT_LANGUAGE'),0,2);
    }
}