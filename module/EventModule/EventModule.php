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
class UserModule extends Module
{
    public function boot()
    {
        $this->container->get('router')->addRoute('getEvents', new Route('/event/get', array(), array(), ':Event:Event:getEvents'));
    }
}