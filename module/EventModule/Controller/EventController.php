<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 06/11/2017
 * Time: 17:18
 */

namespace EventModule\Controller;


use EventModule\Entity\Event;
use ZZFramework\Application\Controller\Controller;

/**
 * Class EventController
 * Controller of all events related pages
 * @package EventModule\Controller
 * @author Alexis Delahaye <alexis.delahaye@etu.uca.fr>
 */
class EventController extends Controller
{
    /**
     * List of all events
     * @return \ZZFramework\Http\Response
     */
    public function getEventsAction()
    {
        $this->denyUnauthenticatedAccess();

        $events = $this->getOrm()->getRepository(Event::class)->findBy(array(), array("title" => "ASC"));

        return $this->render('allEvents.html.twig', array(
            'event_array' => $events,
            'title' => 'event.title.all',
        ));
    }

    /**
     * Display one event
     * @param $id
     * @return \ZZFramework\Http\Response
     */
    public function getEventAction($id)
    {
        $repository = $this->getOrm()->getRepository(Event::class);

        $event = $repository->find($id);

        if (!$event) {
            throw $this->createNotFoundException("Event doesn't exists!");
        }

        return $this->render('oneEvent.html.twig', array(
            'title' => 'Voir evenement',
            'event' => $event,
        ));
    }

    /**
     * Delete an event
     * @param $id
     * @return \ZZFramework\Http\RedirectResponse
     */
    public function deleteEventAction($id) {
        $mgr = $this->getOrm()->getManager();

        $event = $this->getOrm()->getRepository(Event::class)->find($id);

        if (!$event) {
            throw $this->createNotFoundException("Event doesn't exists!");
        }

        $mgr->remove($event);

        $mgr->flush();

        return $this->redirect('/');
    }

    /**
     * Add a new event
     */
    public function addEventAction() {

    }

    /**
     * Edit an existing event
     * @param $id
     */
    public function editEventAction($id) {

    }
}