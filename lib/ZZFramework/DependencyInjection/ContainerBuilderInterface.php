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

/**
 * Interface ContainerBuilderInterface
 * Extend the container with building capacities
 * After build() is called, you can't modify the container
 * @package ZZFramework\DependencyInjection
 */
interface ContainerBuilderInterface extends ContainerInterface
{
    /**
     * Freeze the graph of the container
     */
    public function build();

    /**
     * Add a new service definition to the container
     * @see Definition
     * @param $id
     * @param Definition $definition
     */
    public function register($id, Definition $definition);
}