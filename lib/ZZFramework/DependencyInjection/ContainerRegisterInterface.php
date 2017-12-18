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
 * Interface ContainerRegisterInterface
 * Must be implemented by extensions class
 * to extend the container
 * @package ZZFramework\DependencyInjection
 */
interface ContainerRegisterInterface
{
    /**
     * Visitor pattern
     * This method is called during Container building
     * to register extensions (service and definitions)
     * @param ContainerBuilderInterface $container
     */
    public function registerExtensions(ContainerBuilderInterface $container);
}