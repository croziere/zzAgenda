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
        $this->container->get('orm')->addRepository($this->container->get('repository.event'));


        $this->addRoute('getEvents', '/', ':Event:Event:getEvents');

        $this->addRoute('getEvent', '/event/:id', ':Event:Event:getEvent', array(
            'id' => '[a-zA-Z0-9-]+'
        ));

        $this->addRoute('event.delete', '/event/delete/:id', ':Event:Event:deleteEvent', array(
            'id' => 'a-zA-Z0-9-',
        ));
    }
}