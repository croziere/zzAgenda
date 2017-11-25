<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserModule\ContainerServices;


use UserModule\Repository\UserRepository;
use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\Definition;

class UserContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $providerDef = new Definition(UserRepository::class);

        $container->register('user.provider', $providerDef);
    }
}