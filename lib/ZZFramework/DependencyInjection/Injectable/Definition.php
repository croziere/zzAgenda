<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection\Injectable;

/**
 * Class Definition
 * Represents a service definition
 * @package ZZFramework\DependencyInjection\Injectable
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class Definition
{
    private $class;
    private $arguments = array();
    private $methodCalls = array();

    /**
     * Definition constructor.
     * @param $class
     * @param array $arguments
     */
    public function __construct($class, array $arguments)
    {
        $this->class = $class;
        $this->arguments = $arguments;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param $argument
     * @return $this
     */
    public function addArgument($argument)
    {
        $this->arguments[] = $argument;
        return $this;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param $method
     * @param array $arguments
     * @return $this
     */
    public function addCall($method, array $arguments = array())
    {
        $this->methodCalls[] = array($method, $arguments);
        return $this;
    }

    /**
     * @return array
     */
    public function getMethodCalls()
    {
        return $this->methodCalls;
    }

}