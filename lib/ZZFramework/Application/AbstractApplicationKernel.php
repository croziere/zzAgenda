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


use ZZFramework\DependencyInjection\ContainerBuilder as Container;
use ZZFramework\Http\HttpProcessorInterface;
use ZZFramework\Http\Request;

abstract class AbstractApplicationKernel implements ApplicationKernelInterface
{
    protected $modules = array();

    protected $rootDir;
    protected $cacheDir;
    protected $debug;
    protected $environment;
    protected $container;

    protected $booted = false;

    /**
     * AbstractApplicationKernel constructor.
     * @param $environment
     * @param $debug
     */
    public function __construct($environment, $debug)
    {
        $this->environment = $environment;
        $this->debug = (bool) $debug;
        $this->rootDir = $this->getAppRootDir();
    }

    public abstract function registerModules();

    public function getModules()
    {
        return $this->modules;
    }

    public function getModule($name)
    {
        if(!isset($this->modules[$name])) {
            return null;
        }
        return $this->modules[$name];
    }

    public function initModules() {
        foreach ($this->registerModules() as $module) {
            $name = $module->getName();

            if(isset($this->modules[$name])) {
                throw new \LogicException(sprintf("Tried to load modules with identical name: %s", $name));
            }

            $this->modules[$name] = $module;
        }
    }

    public function initContainer() {
        $this->container = new Container();
        $this->container->set('kernel', $this);

        foreach ($this->modules as $module) {
            if ($module->getContainerRegister()) {
                $this->container->addRegister($module->getContainerRegister());
            }

            $this->container->build();
        }
    }

    public function boot()
    {
        if(true === $this->booted) {
            return;
        }

        $this->initModules();
        $this->initContainer();

        foreach ($this->getModules() as $module) {
            $module->setContainer($this->container);
            $module->boot();
        }

        $this->booted = true;
    }

    public function shutdown()
    {
        // TODO: Implement shutdown() method.
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function isDebug()
    {
        return $this->debug;
    }

    public function getAppRootDir()
    {
        if(null === $this->rootDir) {
            $r = new \ReflectionObject($this);
            $this->rootDir = dirname($r->getFileName());
        }

        return $this->rootDir;
    }

    public function getCacheDir()
    {
        return $this->rootDir.'/cache/';
    }

    public function registerContainerConfig()
    {
        // TODO: Implement registerContainerConfig() method.
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function handle(Request $request) {
        if(false === $this->booted) {
            $this->boot();
        }

        return $this->getHttpProcessor()->handle($request);
    }

    public function getHttpProcessor() : HttpProcessorInterface {
        return $this->container->get('http_processor');
    }
}