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

abstract class Module extends ContainerAware implements ModuleInterface
{
    protected $name;
    protected $containerRegister;
    protected $path;

    public function boot() {

    }

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

    public function getContainerRegisterClass() {
        $name = preg_replace('/Module$/', '', $this->getName());
        return $this->getNamespace().'\\ContainerServices\\'.$name.'ContainerRegister';
    }

    public final function getName()
    {
        if(null !== $this->name) {
            return $this->name;
        }

        $name = get_class($this);
        $pos = strrpos($name, '\\');
        return $this->name = false === $pos ? $name : substr($name, $pos + 1);
    }

    public final function getNamespace() {
        $ns = get_class($this);

        return substr($ns, 0, strrpos($ns, '\\'));
    }

    public final function getPath() {
        if(null === $this->path) {
            $r = new \ReflectionObject($this);
            $this->path = dirname($r->getFileName());
        }
        return $this->path;
    }

    /**
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