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
 * Interface HydratorInterface
 * All entity hydrator must implements this interface
 * @package JSONFileDB\Components\Orm\Hydrator
 */
interface HydratorInterface
{
    /**
     * Hydrate one single entity from a row of data
     * @param $row
     * @return mixed
     * @throws NoIdFieldException The entity has no $id field
     * @throws MissingFieldException The entity has a missing field
     */
    public function hydrateOne($row);

    /**
     * Hydrate a collection of entity
     * @param $collection
     * @return mixed
     * @throws NoIdFieldException The entity has no $id field
     * @throws MissingFieldException The entity has a missing field
     */
    public function hydrateCollection($collection);
}