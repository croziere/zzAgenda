<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Application;

use ZZFramework\Application\Module\ModuleInterface;
use ZZFramework\DependencyInjection\ContainerInterface;


/**
 * Interface ApplicationKernelInterface
 * Represents an application
 * made of modules dynamically loaded
 * using an DIC
 * @package ZZFramework\Application
 */
interface ApplicationKernelInterface
{
    /**
     * Register a module to the app
     */
    public function registerModules();

    /**
     * Returns the list of loaded modules
     */
    public function getModules();

    /**
     * Returns a loaded module
     * @param $name
     * @return ModuleInterface
     */
    public function getModule($name);

    /**
     * Startup the app
     */
    public function boot();

    /**
     * Stop the app
     */
    public function shutdown();

    /**
     * Get the env the app is running with
     */
    public function getEnvironment();

    /**
     * Returns true whether the app is
     * in debug mode
     * @return bool
     */
    public function isDebug(): bool;

    /**
     * Returns the root path of the app
     * @return string
     */
    public function getAppRootDir(): string;

    /**
     * Returns a writable cache dir
     * @return string
     */
    public function getCacheDir(): string;

    /**
     * Register the DIC configuration
     */
    public function registerContainerConfig();

    /**
     * Returns the DIC
     * @return ContainerInterface
     */
    public function getContainer();
}