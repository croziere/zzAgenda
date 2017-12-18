<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Application\Module;

/**
 * Interface ModuleInterface
 * A module is the entry point of a feature
 * Loaded and booted by the kernel
 * @package ZZFramework\Application\Module
 */
interface ModuleInterface
{
    /**
     * Boots the Module
     * Use this method to initialize the framework
     */
    public function boot();

    /**
     * Returns the unique name of this module
     * @return string
     */
    public function getName(): string;
}