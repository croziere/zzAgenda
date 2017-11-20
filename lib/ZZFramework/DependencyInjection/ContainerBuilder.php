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
use ZZFramework\DependencyInjection\Injectable\Reference;

/**
 * Class ContainerBuilder
 *
 * @package ZZFramework\DependencyInjection
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class ContainerBuilder extends Container implements ContainerBuilderInterface
{
    private $registers = array();
    private $definitions = array();

    /**
     * @param $id
     * @return mixed|object
     */
    public function get($id) {
        $id = strtolower($id);

        try {
            $service = parent::get($id);
            return $service;
        }
        catch (\Exception $e) {

        }

        if(!array_key_exists($id, $this->definitions)) {
            throw new \LogicException(sprintf("Service definition %s doesn't exists!", $id));
        }

        $service = $this->createService($this->definitions[$id], $id);

        return $service;
    }

    public function set($id, $service)
    {
        $id = strtolower($id);

        if($service instanceof Definition) {
            $this->addDefinition($id, $service);
            return;
        }

        if(isset($this->definitions[$id])) {
            unset($this->definitions[$id]);
        }
        parent::set($id, $service);
    }

    private function createService(Definition $definition,  $id) {
        $arguments = $this->resolveDependencies($definition->getArguments());

        $r = new \ReflectionClass($definition->getClass());
        $service = null === $r->getConstructor() ? $r->newInstance() : $r->newInstanceArgs($arguments);

        foreach ($definition->getMethodCalls() as $call) {
            $this->callMethod($service, $call);
        }

        return $service;
    }

    private function resolveDependencies($value) {

        if(is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->resolveDependencies($v);
            }
        }
        elseif ($value instanceof Reference) {
            $value = $this->get((string) $value);
        }

        return $value;
    }

    private function callMethod($service, $callable) {
        call_user_func_array(array($service, $callable[0]), $this->resolveDependencies($callable[1]));
    }

    public function register($id, Definition $definition) {
        $id = strtolower($id);

        return $this->definitions[$id] = $definition;
    }

    public function addRegister(ContainerRegisterInterface $extension) {
        $this->registers[] = $extension;
    }

    public function build() {
        foreach ($this->registers as $r) {
            $r->registerExtensions($this);
        }
    }

    private function addDefinition($id, $definition)
    {
        $this->definitions[$id] = $definition;
    }
}