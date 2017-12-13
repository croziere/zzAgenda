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
        $this->addRoute('login', '/login', ':User:Security:login');

        $this->container->get('orm')->addRepository($this->container->get('repository.user'));
    }
}