<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection;

/**
 * Interface ContainerAwareInterface
 * Represents a class which can accept the container
 * @package ZZFramework\DependencyInjection
 */
interface ContainerAwareInterface
{
    public function setContainer(ContainerInterface $container);
}