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
 * Implements a editable container
 * @package ZZFramework\DependencyInjection
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class ContainerBuilder extends Container implements ContainerBuilderInterface
{
    /**
     * @var array Extensions classes
     */
    private $registers = array();

    /**
     * @var array Service definitions
     */
    private $definitions = array();

    /**
     * Returns an instance of a service
     * Build it if it's a definition, otherwise return the instance
     * @param $id
     * @return mixed
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

    /**
     * @inheritdoc
     */
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

    /**
     * Create a service from a definition
     * @param Definition $definition
     * @param $id
     * @return object
     */
    private function createService(Definition $definition,  $id) {
        $arguments = $this->resolveDependencies($definition->getArguments());

        $r = new \ReflectionClass($definition->getClass());
        $service = null === $r->getConstructor() ? $r->newInstance() : $r->newInstanceArgs($arguments);

        foreach ($definition->getMethodCalls() as $call) {
            $this->callMethod($service, $call);
        }

        return $service;
    }

    /**
     * Resolve all dependencies
     * @param $value
     * @return array|mixed
     */
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

    /**
     * Call a method on a class
     * @param $service
     * @param $callable
     */
    private function callMethod($service, $callable) {
        call_user_func_array(array($service, $callable[0]), $this->resolveDependencies($callable[1]));
    }

    /**
     * @inheritdoc
     */
    public function register($id, Definition $definition) {
        $id = strtolower($id);

        return $this->definitions[$id] = $definition;
    }

    /**
     * Add an extension class
     * @param ContainerRegisterInterface $extension
     */
    public function addRegister(ContainerRegisterInterface $extension) {
        $this->registers[] = $extension;
    }

    /**
     * Build the container
     */
    public function build() {
        foreach ($this->registers as $r) {
            $r->registerExtensions($this);
        }
    }

    /**
     * Add a definition
     * @param $id
     * @param $definition
     * @internal
     */
    private function addDefinition($id, $definition)
    {
        $this->definitions[$id] = $definition;
    }
}