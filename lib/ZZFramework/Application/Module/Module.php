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


use ZZFramework\DependencyInjection\ContainerRegisterInterface;
use ZZFramework\DependencyInjection\Injectable\ContainerAware;
use ZZFramework\Routing\Route;

/**
 * Class Module
 * This class implements a base of ModuleInterface
 * Add convenient methods
 * @see ModuleInterface
 * @package ZZFramework\Application\Module
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
abstract class Module extends ContainerAware implements ModuleInterface
{
    protected $name;
    protected $containerRegister;
    protected $path;

    /**
     * @inheritdoc
     */
    public function boot() {

    }

    /**
     * Return the container extension of this module
     * @return bool|null|ContainerRegisterInterface
     */
    public function getContainerRegister() {

        if(null === $this->containerRegister) {
            $class = $this->getContainerRegisterClass();

            if(class_exists($class)) {
                $containerRegister = new $class();

                if(!$containerRegister instanceof ContainerRegisterInterface) {
                    throw new \LogicException(sprintf("Class %s must implements ZZFramework\DependencyInjection\ContainerRegisterInterface", $class));
                }
                $this->containerRegister = $containerRegister;
            }
            else {
                $this->containerRegister = false;
            }
        }

        if($this->containerRegister) {
            return $this->containerRegister;
        }

        return null;
    }

    /**
     * Return the container extension classpath
     * Must be in ContainerServices folder
     * Must be named <ModuleName>ContainerRegister
     * @return string
     */
    public function getContainerRegisterClass() {
        $name = preg_replace('/Module$/', '', $this->getName());
        return $this->getNamespace().'\\ContainerServices\\'.$name.'ContainerRegister';
    }

    /**
     * @inheritdoc
     */
    public final function getName(): string
    {
        if(null !== $this->name) {
            return $this->name;
        }

        $name = get_class($this);
        $pos = strrpos($name, '\\');
        return $this->name = false === $pos ? $name : substr($name, $pos + 1);
    }

    /**
     * Returns the namespace of the module
     * @return string
     */
    public final function getNamespace() {
        $ns = get_class($this);

        return substr($ns, 0, strrpos($ns, '\\'));
    }

    /**
     * Returns the path of this file
     * @return string
     */
    public final function getPath() {
        if(null === $this->path) {
            $r = new \ReflectionObject($this);
            $this->path = dirname($r->getFileName());
        }
        return $this->path;
    }

    /**
     * Convenience method to register a route in the router
     * @param $id
     * @param string $path
     * @param $controller
     * @param array $attributes
     * @param array $methods
     */
    protected function addRoute($id, string $path, $controller, array $attributes = array(), array $methods = array()) {
        $this->container->get('router')->addRoute($id, new Route($path, $attributes, $methods, $controller));
    }
}