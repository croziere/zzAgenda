<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Orm\Hydrator;


use JSONFileDB\Components\Orm\Exception\MissingFieldException;
use JSONFileDB\Components\Orm\Exception\NoIdFieldException;

/**
 * Class ReflectionHydrator
 * Hydrate a php class from array data row using reflection api
 * @package JSONFileDB\Components\Orm\Hydrator
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class ReflectionHydrator implements HydratorInterface
{

    const EXCEPTION_STRATEGY = 1;
    const SILENT_STRATEGY = 2;

    protected $class;

    protected $strategy;

    /**
     * ReflectionHydrator constructor.
     * @param mixed $class
     * @param int $strategy
     */
    public function __construct($class, $strategy = ReflectionHydrator::EXCEPTION_STRATEGY)
    {
        $this->class = new \ReflectionClass($class);
        $this->strategy = $strategy;
    }

    /**
     * @inheritdoc
     */
    public function hydrateOne($row)
    {
        $object = $this->class->newInstanceWithoutConstructor();

        $ref = new \ReflectionObject($object);

        foreach ($row as $key => $value) {
            if ($key === "_id") {
                $this->hydrateId($object, $ref, $value);
            } else {
                $this->hydrateProperty($object, $ref, $key, $value);
            }
        }

        return $object;
    }

    /**
     * @inheritdoc
     */
    public function hydrateCollection($collection)
    {
        $results = array();
        foreach ($collection as $row) {
            $results[] = $this->hydrateOne($row);
        }

        return $results;
    }

    private function hydrateProperty($object, \ReflectionObject $ref, $property, $value)
    {
        if (!$ref->hasProperty($property) && $this->strategy === ReflectionHydrator::EXCEPTION_STRATEGY) {
            throw new MissingFieldException($property, $ref->getName());
        }

        $this->setPrivateValue($object, $ref, $property, $value);
    }

    private function hydrateId($object, \ReflectionObject $ref, $idValue) {
        if (!$ref->hasProperty("id")) {
            throw new NoIdFieldException($ref->getName());
        }

        $this->setPrivateValue($object, $ref, "id", $idValue);
    }

    /**
     * Set the value of a private member
     * @param mixed $object The object to set the value to
     * @param \ReflectionObject $ref The reflection of $object
     * @param string $property The property name
     * @param mixed $value The value to set
     */
    private function setPrivateValue($object, \ReflectionObject $ref, $property, $value)
    {
        $property = $ref->getProperty($property);

        $property->setAccessible(true);
        $property->setValue($object, $value);
    }
}