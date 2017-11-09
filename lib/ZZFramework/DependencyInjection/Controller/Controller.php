<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection\Controller;


use ZZFramework\DependencyInjection\Injectable\ContainerAware;

abstract class Controller extends ContainerAware
{
    /**
     * Get a service from the container
     * @param string $id
     * @return mixed
     */
    public function get(string $id) {
        return $this->container->get($id);
    }

    /**
     * Render a template and returns the response
     * @param $template
     * @param array $data
     * @return mixed
     */
    public function render($template, array $data = array()) {
        return $this->get('templating')->render($template, $data);
    }
}