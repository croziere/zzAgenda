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
 * Interface ContainerInterface
 * A simple contract of a DIC
 * @package ZZFramework\DependencyInjection
 */
interface ContainerInterface
{
    /**
     * Add a service to the Container
     * @param $id
     * @param $service
     */
    public function set($id, $service);

    /**
     * Returns a service from the Container
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * Returns true if the Container
     * has the specified service
     * @param $id
     * @return bool
     */
    public function has($id);
}