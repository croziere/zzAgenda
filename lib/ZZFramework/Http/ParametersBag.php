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

/**
 * Class ParametersBag
 * Array decorator
 * Add object accessor to an array
 * @package ZZFramework\Http
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class ParametersBag implements \IteratorAggregate, \Countable
{
    /**
     * Inner data holder
     * @var array
     */
    protected $parameters;

    /**
     * ParametersBag constructor.
     * @param $parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters = $parameters;
    }

    /**
     * Returns the value for $key key
     * @param string $key
     * @return mixed
     */
    public function get($key) {
        return $this->parameters[$key];
    }

    /**
     * Returns true if the key $key is set
     * @param $key
     * @return bool
     */
    public function has($key) {
        return isset($this->parameters[$key]);
    }

    /**
     * Add or replace a new entry
     * @deprecated Use set instead of add
     * @param string $key
     * @param mixed $value
     */
    public function add($key, $value) {
        $this->set($key, $value);
    }

    /**
     * Returns the inner data holder
     * @return array
     */
    public function all() {
        return $this->parameters;
    }

    /**
     * Merge an array to the current set
     * @param array $params
     */
    public function merge(array $params) {
        $this->parameters = array_merge($this->parameters, $params);
    }

    /**
     * Add or replace a new entry
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value) {
        $this->parameters[$key] = $value;
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->parameters);
    }
}