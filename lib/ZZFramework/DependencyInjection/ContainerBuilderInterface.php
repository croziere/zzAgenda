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


use ZZFramework\DependencyInjection\Injectable\Definition;

interface ContainerBuilderInterface extends ContainerInterface
{
    public function build();

    public function register($id, Definition $definition);
}