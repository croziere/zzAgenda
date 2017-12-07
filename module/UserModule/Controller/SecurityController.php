<?php
/**
 * Created by PhpStorm.
 * User: aldelahaye1
 * Date: 20/11/17
 * Time: 17:20
 */

namespace UserModule\Controller;


use ZZFramework\Application\Controller\Controller;
use ZZFramework\Http\RedirectResponse;

class SecurityController extends Controller
{
    public function loginAction(){

        if ($this->isAuthenticated()) {
            return new RedirectResponse('/');
        }

        $lastUsername = '';

        return $this->render('login.html.twig', array(
            'username' => $lastUsername,
            'title' => 'Login'
        ));
    }
}