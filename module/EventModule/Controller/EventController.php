<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 06/11/2017
 * Time: 17:18
 */

namespace EventModule\Controller;


use UserModule\Entity\User;
use ZZFramework\Application\Controller\Controller;

class EventController extends Controller
{

    public function getEventsAction(){
        $database = $this->container->get('database');

        $table = $database->getTable('event');

        $data_set = $table->select("*");
        $events_array = $data_set->fetch();

        // sort events by date
        usort($events_array, function ($a, $b) {
            // using strtotime and substracting date 1 by date 2
            return strtotime($a['dateTime'])-strtotime($b['dateTime']);
        });

        return $this->render('allEvents.html.twig', array(
            'event_array' => $events_array,
            'title' => 'Tous les evenements'
        ));
    }

    public function getEventAction($eventName){
        $database = $this->container->get('database');
        $table = $database->getTable('event');

        $data_set = $table->select("*");
        $events_array = $data_set->fetch();

        // get only the interesting event (search by name)
        $foundEvents = array_filter($events_array, function($el) use ($eventName) {
            return $el['title'] === $eventName;
        });

        if (!count($foundEvents)) {
            throw new \Exception(sprintf("Event %s not found!", $eventName));
        }

        $theEvent = (object) $foundEvents[0];

        // transform date to 3 different var ( used in html template)
        list($day, $month, $year) = explode('/', $theEvent->dateTime);

        return $this->render('oneEvent.html.twig', array(
            'title' => 'Voir evenement',
            'eventname' => $theEvent->title,
            'eventdescription' => $theEvent->description,
            'eventday' => $day,
            'eventmonth' => $month,
            'eventyear' => $year,
            'eventlocation' => $theEvent->location
        ));
    }
}