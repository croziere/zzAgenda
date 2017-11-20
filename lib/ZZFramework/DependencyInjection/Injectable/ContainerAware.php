<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection\Injectable;


use ZZFramework\DependencyInjection\ContainerAwareInterface;
use ZZFramework\DependencyInjection\ContainerInterface;

abstract class ContainerAware implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
}