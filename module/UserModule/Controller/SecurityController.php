<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 17:20
 */

namespace UserModule\Controller;


use ZZFramework\Application\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction(){
        // TODO : $this->>getUser() verify is authenticated => refuse login

        return $this->render('login.html.twig', array(
            'username' => $trucRetourneParFirewall,
            'title' => 'Login'
        ));
    }
}