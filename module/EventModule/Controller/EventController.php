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

        $data_set = $table->select("*");
        $events_array = $data_set->fetch();
        
        return $this->render('allEvents.html.twig', array(
            'event_array' => $events_array,
            'title' => 'Tous les evenements'
        ));
    }

    public function getEventAction(){
        // TODO : use getEvents , filter only needed event
        return $this->render('oneEvent.html.twig', array(
            'title' => 'Voir evenement',
            'eventday' => 8,
            'eventmonth' => 'Juin',
            'eventyear' => 2017,
            'eventlocation' => 'Aubière'
        ));
    }
}