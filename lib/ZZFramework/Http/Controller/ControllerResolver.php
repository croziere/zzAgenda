<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http\Controller;


use ZZFramework\DependencyInjection\ContainerAwareInterface;
use ZZFramework\Http\Request;

class ControllerResolver implements ControllerResolverInterface
{


    public function getController(Request $request)
    {
        if(!$controller = $request->attributes->get("_controller")) {
            return false;
        }

        if(is_array($controller)) {
            return $controller;
        }

        return $this->getCallable($controller);
    }

    public function getArguments(Request $request, $controller)
    {
        if(is_array($controller)) {
            $r = new \ReflectionMethod($controller[0], $controller[1]);
        } else {
            $r = new \ReflectionFunction($controller);
        }

        return $this->resolveArguments($request, $controller, $r->getParameters());
    }

    private function resolveArguments(Request $request, $controller, array $args) {
        $attributes = $request->attributes->all();
        $arguments = array();

        foreach ($args as $param) {
            if(array_key_exists($param->name, $attributes)) {
                $arguments[] = $attributes[$param->name];
            } elseif ($param->getClass() && $param->getClass()->isInstance($request)) {
                $arguments[] = $request;
            } elseif ($param->isDefaultValueAvailable()) {
                $arguments[] = $param->getDefaultValue();
            } else {
                throw new \Exception(sprintf("Arg %s not found!", $param->name));
            }
        }

        return $arguments;
    }

    protected function getCallable($controller) {
        if(false === strpos($controller, ':')) {
            throw new \LogicException(sprintf("Malformed controller id: %s", $controller));
        }

        list($vendor, $module, $class, $method) = explode(':', $controller);
        $class = sprintf("%s\\%sModule\\Controller\\%sController", $vendor, $module, $class);
        $method = sprintf("%sAction", strtolower($method));

        if(!class_exists($class)) {
            throw new \LogicException(sprintf("Controller %s not found!", $class));
        }

        return array(new $class, $method);
    }
}