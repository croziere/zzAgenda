<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\SecurityModule\ContainerServices;


use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\Definition;
use ZZFramework\DependencyInjection\Injectable\Reference;
use ZZFramework\Security\Authentication\Handler\AnonymousAuthenticationHandler;
use ZZFramework\Security\Authentication\Handler\FormAuthenticationHandler;
use ZZFramework\Security\Authentication\Handler\SessionAuthenticationHandler;
use ZZFramework\Security\Firewall;
use ZZFramework\Security\Security;

class SecurityContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $formAuthHandlerDef = new Definition(FormAuthenticationHandler::class);
        $formAuthHandlerDef->addArgument(new Reference('user.provider'));

        $sessionAuthHandlerDef = new Definition(SessionAuthenticationHandler::class);
        $sessionAuthHandlerDef->addArgument(new Reference('user.provider'));

        $anonAuthHandlerDef = new Definition(AnonymousAuthenticationHandler::class);

        $firewall = new Firewall(array());

        $security = new Security($container);

        $container->register('security.handler.form', $formAuthHandlerDef);
        $container->register('security.handler.session', $sessionAuthHandlerDef);
        $container->register('security.handler.anon', $anonAuthHandlerDef);

        $container->set('firewall', $firewall);
        $container->set('security', $security);
    }
}