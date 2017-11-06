<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Routing;


class Route
{

    private $path = "/";

    private $attributes = array();

    private $compiled = null;

    private $methods = array();

    private $controller;

    /**
     * Route constructor.
     * @param string $path
     * @param array $attributes
     * @param array $methods
     * @param $controller
     * @internal param null $compiled
     */
    public function __construct($path = '/', array $attributes = array(), array $methods = array(), $controller = null)
    {
        $this->path = $path;
        $this->attributes = $attributes;
        $this->methods = $methods;
        $this->controller = $controller;
        $this->compile();
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path)
    {
        $this->path = "/".ltrim(trim($path), '/');
        $this->compiled = null;

        return $this;
    }

    /**
     * @return null
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param null $controller
     * @return $this
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    private function compile()
    {
        if(null === $this->compiled) {
            return;
        }

        $regex = '/^'.str_replace('/', '\/', $this->path).'$/';
        foreach ($this->attributes as $attr => $reg) {
            $fnd = '(['.$reg.']+)';
            $regex = str_replace(':'.$attr, $fnd, $regex);
        }
        $this->compiled = $regex;
    }

    public function getRegex() {
        $this->compile();
        return $this->compiled;
    }


}