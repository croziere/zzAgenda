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


use ZZFramework\Application\AbstractApplicationKernel;

class ApplicationKernel extends AbstractApplicationKernel
{

    public function registerModules()
    {
        return array(
            new \ZZFramework\Module\ConfigModule\ConfigModule(),
        );
    }
}