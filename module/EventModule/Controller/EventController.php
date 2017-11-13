<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 06/11/2017
 * Time: 17:18
 */

namespace EventModule\Controller;


use ZZFramework\DependencyInjection\Injectable\ContainerAware;

class EventController extends ContainerAware
{


    public function getEventsAction(){
        $database = $this->container->get('database');
        $table = $database->getTable('event');
        return new Response('YoloEvent');
    }
}