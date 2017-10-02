<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $events = $this->getDoctrine()->getRepository('EventBundle:Event')->findAll();


        return $this->render('EventBundle:Default:index.html.twig', array(
            'events' => $events,
        ));
    }
}
