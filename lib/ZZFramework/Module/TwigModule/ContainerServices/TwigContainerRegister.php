<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Module\TwigModule\ContainerServices;


use ZZFramework\Application\ApplicationKernelInterface;
use ZZFramework\DependencyInjection\ContainerBuilderInterface;
use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\Definition;
use ZZFramework\DependencyInjection\Injectable\Reference;

class TwigContainerRegister implements ContainerRegisterInterface
{

    public function registerExtensions(ContainerBuilderInterface $container)
    {
        $loader = new \Twig_Loader_Filesystem($this->createTemplatingPaths($container->get('kernel')));

        $twig = new \Twig_Environment($loader, array(
            'cache' => $container->get('kernel')->getCacheDir(),
            'debug' => $container->get('kernel')->isDebug(),
        ));

        $container->set('templating.loader', $loader);
        $container->set('templating', $twig);
    }

    private function createTemplatingPaths(ApplicationKernelInterface $kernel) {
        $paths = array();
        foreach ($kernel->getModules() as $module) {
            $dir = $module->getPath().'/Template/';
            if(is_dir($dir)) {
                $paths[] = $module->getPath().'/Template/';
            }
        }
        $paths[] = $kernel->getAppRootDir().'/Template/';

        return $paths;
    }
}