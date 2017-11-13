<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 06/11/2017
 * Time: 17:18
 */

namespace EventModule\Controller;


use ZZFramework\Application\Controller\Controller;

class EventController extends Controller
{

    public function getEventsAction(){
        $database = $this->container->get('database');
        $table = $database->getTable('event');
        $templating = $this->container->get('templating');


        return $this->render('oneEvent.html.twig', array(
            'eventday' => 8,
            'eventmonth' => 'Juin',
            'eventyear' => 2017,
            'eventlocation' => 'Aubière'
        ));
    }
}