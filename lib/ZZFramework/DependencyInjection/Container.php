<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection;

/**
 * Class Container
 * Simple implementation of a DIC Container
 * Handle only preconstructed services
 * @package ZZFramework\DependencyInjection
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class Container implements ContainerInterface
{

    protected $services = array();

    /**
     * Add a service to the Container
     * @param $id
     * @param $service
     */
    public function set($id, $service)
    {
        $id = strtolower($id);

        if('container' === $id) {
            return;
        }

        if(null === $service) {
            if(isset($this->services[$id])) {
                unset($this->services[$id]);
            }
            return;
        }

        $this->services[$id] = $service;
    }

    /**
     * Returns a service from the Container
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $id = strtolower($id);
        if('container' === $id) {
            return $this;
        }

        if(!isset($this->services[$id])) {
            throw new ServiceNotFoundException(sprintf("Uknown service %s", $id));
        }

        return $this->services[$id];
    }

    /**
     * Returns true if the Container
     * has the specified service
     * @param $id
     * @return bool
     */
    public function has($id)
    {
        $id = strtolower($id);
        if ('container' === $id || isset($this->services[$id])) {
            return true;
        }

        return false;
    }
}