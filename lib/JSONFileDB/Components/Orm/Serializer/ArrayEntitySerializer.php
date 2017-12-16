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


class ArrayEntitySerializer implements SerializerInterface
{
    private $serializers = array();

    public function serialize($entity)
    {
        $class = get_class($entity);

        if (!$this->serializers[$class]) {
            $this->serializers[$class] = new AnnotationSerializer($class);
        }

        return $this->serializers[$class]->serialize($entity);
    }
}