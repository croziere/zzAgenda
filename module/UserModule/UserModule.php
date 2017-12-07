<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserModule;

use ZZFramework\Application\Module\Module;
use ZZFramework\Routing\Route;

class UserModule extends Module
{
    public function boot()
    {
        $this->container->get('router')->addRoute('homepage', new Route('/', array(), array(), ':User:Test:index'));

        $this->container->get('orm')->addRepository($this->container->get('repository.user'));
    }
}