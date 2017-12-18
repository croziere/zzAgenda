<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Orm\Serializer;


class AnnotationSerializer implements SerializerInterface
{

    const MAPPING_STRING = "@Mapped";

    private $mappedProperties = array();

    /**
     * AnnotationSerializer constructor.
     */
    public function __construct($entity)
    {
        $this->buildMapping($entity);
    }


    public function serialize($entity)
    {
        $serialized = array();

        foreach ($this->mappedProperties as $property) {
            $property->setAccessible(true);
            $serialized[$property->getName()] = $property->getValue($entity);
        }

        $serialized['_id'] = $serialized['id'];
        unset($serialized['id']);

        return $serialized;
    }

    private function buildMapping($entity)
    {
        if (is_string($entity)) {
            $class = $entity;
        } else {
            $class = get_class($entity);
        }

        $refClass = new \ReflectionClass($class);

        $this->mappedProperties = array_filter($refClass->getProperties(), function (\ReflectionProperty $property) {
            return $this->isMapped($property);
        });
    }

    private function isMapped(\ReflectionProperty $property)
    {
        return strpos($property->getDocComment(), AnnotationSerializer::MAPPING_STRING) !== false;
    }
}