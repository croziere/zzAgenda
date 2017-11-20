<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserModule\Controller;


use ZZFramework\DependencyInjection\Injectable\ContainerAware;
use ZZFramework\Http\Response;

class TestController extends ContainerAware
{
    public function indexAction() {

        $database = $this->container->get('database');

        $table = $database->getTable('user');

        return new Response('Yolo');
    }
}