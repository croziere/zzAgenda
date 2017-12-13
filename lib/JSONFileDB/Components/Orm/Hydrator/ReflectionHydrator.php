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


class ReflectionHydrator implements HydratorInterface
{

    const EXCEPTION_STRATEGY = 1;
    const SILENT_STRATEGY = 2;

    protected $class;

    protected $strategy;

    /**
     * ReflectionHydrator constructor.
     * @param $class
     * @param int $strategy
     */
    public function __construct($class, $strategy = ReflectionHydrator::EXCEPTION_STRATEGY)
    {
        $this->class = new \ReflectionClass($class);
        $this->strategy = $strategy;
    }


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
            throw new \Exception(sprintf("Entity %s has no property named %s!", $ref->getName(), $property));
        }

        $this->setPrivateValue($object, $ref, $property, $value);
    }

    private function hydrateId($object, \ReflectionObject $ref, $idValue) {
        if (!$ref->hasProperty("id")) {
            throw new \Exception(sprintf("Entity %s must have property named 'id'!", $ref->getName()));
        }

        $this->setPrivateValue($object, $ref, "id", $idValue);
    }

    /**
     * @param $object
     * @param \ReflectionObject $ref
     * @param $property
     * @param $value
     */
    private function setPrivateValue($object, \ReflectionObject $ref, $property, $value)
    {
        $property = $ref->getProperty($property);

        $property->setAccessible(true);
        $property->setValue($object, $value);
    }
}