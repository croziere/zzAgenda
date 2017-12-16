<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Application\Controller;


use JSONFileDB\Components\Orm\Orm;
use ZZFramework\DependencyInjection\Injectable\ContainerAware;
use ZZFramework\Http\Exception\HttpNotFoundException;
use ZZFramework\Http\RedirectResponse;
use ZZFramework\Http\Response;
use ZZFramework\Security\Exception\AccessDeniedException;
use ZZFramework\Security\User\UserInterface;

/**
 * Class Controller
 * Base class of controllers
 * This is just to expose convenience methods
 * @package ZZFramework\Application\Controller
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
abstract class Controller extends ContainerAware
{
    /**
     * Returns the container
     * @return \ZZFramework\DependencyInjection\ContainerInterface
     */
    protected function getContainer() {
        return $this->container;
    }

    /**
     * Returns the service $id
     * @param $id
     * @return mixed
     */
    protected function get($id) {
        return $this->getContainer()->get($id);
    }

    /**
     * Returns true if the service $id is available
     * @param $id
     * @return bool
     */
    protected function has($id) {
        return $this->getContainer()->has($id);
    }

    /**
     * Convenience method to create a response with a rendered template
     * @param $template
     * @param array $data
     * @return Response
     */
    protected function render($template, array $data = array()) {
        return new Response($this->getContainer()->get('templating')->render($template, $data));
    }

    /**
     * Returns true if the current user is authenticated
     * @return bool
     */
    protected function isAuthenticated() {
        return $this->get('security')->getToken()->isAuthenticated();
    }

    /**
     * Returns the current user or null
     * @return null|UserInterface
     */
    protected function getUser() {
        return $this->get('security')->getUser();
    }

    /**
     * Return the Orm
     * @return Orm
     */
    protected function getOrm() {
        return $this->container->get('orm');
    }

    /**
     * Redirect the user to $url
     * @param $url
     * @param int $status
     * @return RedirectResponse
     */
    protected function redirect($url, $status = 302) {
        return new RedirectResponse($url, $status);
    }

    /**
     * Redirect the user to login page if unauthenticated
     * @throws AccessDeniedException
     */
    protected function denyUnauthenticatedAccess() {
        if (!$this->isAuthenticated()) {
            throw new AccessDeniedException();
        }
    }

    protected function createNotFoundException($message = '404 Not Found!', \Exception $previous = null) {
        return new HttpNotFoundException($message, 0, $previous);
    }
}