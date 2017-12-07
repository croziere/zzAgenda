<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Module\JSONDalModule\ContainerServices;


use JSONFileDB\Components\AccessLayer\JSON\JSONDatabase;
use JSONFileDB\Components\Orm\EntityManager;
use JSONFileDB\Components\Orm\Orm;
use ZZFramework\Application\ApplicationKernelInterface;
use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;

class JSONDalContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $databaseInst = new JSONDatabase($container->get('kernel')->getAppRootDir().'/db/', JSONDatabase::READ_WRITE);

        $managerInst = new EntityManager($databaseInst);

        $orm = new Orm($managerInst);

        $container->set('database', $databaseInst);
        $container->set('entitymanager', $managerInst);
        $container->set('orm', $orm);
    }
}