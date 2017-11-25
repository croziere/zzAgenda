<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;



use EventModule\EventModule;


use UserModule\UserModule;
use ZZFramework\Application\AbstractApplicationKernel;

class ApplicationKernel extends AbstractApplicationKernel
{

    public function registerModules()
    {
        $bundles = array(
            new \ZZFramework\Module\ConfigModule\ConfigModule(),
            new \ZZFramework\Module\ExceptionModule\ExceptionModule(),
            new \ZZFramework\Module\TwigModule\TwigModule(),
            new \ZZFramework\Module\SecurityModule\SecurityModule(),
            new EventModule(),
            new UserModule(),
            new \JSONFileDB\Module\JSONDalModule\JSONDalModule(),
        );

        return $bundles;
    }
}