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


use ZZFramework\DependencyInjection\Injectable\ContainerAware;
use ZZFramework\Http\Response;

abstract class Controller extends ContainerAware
{
    /**
     * @return \ZZFramework\DependencyInjection\ContainerInterface
     */
    protected function getContainer() {
        return $this->container;
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function get($id) {
        return $this->getContainer()->get($id);
    }

    /**
     * @param $id
     * @return bool
     */
    protected function has($id) {
        return $this->getContainer()->has($id);
    }

    /**
     * @param $template
     * @param array $data
     * @return Response
     */
    protected function render($template, array $data = array()) {
        return new Response($this->getContainer()->get('templating')->render($template, $data));
    }
}