<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 13/11/17
 * Time: 15:36
 */

namespace EventModule;


use ZZFramework\Application\Module\Module;
use ZZFramework\Routing\Route;
class EventModule extends Module
{
    public function boot()
    {
        $this->addRoute('getEvents', '/events', ':Event:Event:getEvents');
        $this->addRoute('getEvent', '/event/:eventName', ':Event:Event:getEvent',array(
            'eventName' => '[a-zA-Z]+'
        ));
    }
}