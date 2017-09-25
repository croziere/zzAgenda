<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login")
     */
    public function loginAction()
    {
        return $this->render('AdminBundle:Security:login.html.twig', array(
            // ...
        ));
    }

}
