<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http;


class ParametersBag
{
    protected $parameters;

    /**
     * ParametersBag constructor.
     * @param $parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters = $parameters;
    }

    public function get($key) {
        return $this->parameters[$key];
    }

    public function has($key) {
        return isset($this->parameters[$key]);
    }

    public function add($key, $value) {
        $this->parameters[$key] = $value;
    }

    public function all() {
        return $this->parameters;
    }

    public function merge(array $params) {
        $this->parameters = array_merge($this->parameters, $params);
    }


}