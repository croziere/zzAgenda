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

class UserContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $providerDef = new UserRepository();

        $container->set('repository.user', $providerDef);
        $container->set('user.provider', $providerDef);
    }
}