<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Repository;

/**
 * Interface RepositoryInterface
 * Facade for querying data on an entity set
 * @package JSONFileDB\Components\Repository
 */
interface RepositoryInterface
{
    /**
     * Returns a single entity with id $id or null
     * @param $id
     * @return object|null
     */
    public function find($id);

    /**
     * Returns all the entities
     * @return array
     */
    public function findAll();

    /**
     * Find all entities meeting $criteria
     * Can be ordered by $orderBy
     * @param array $criteria
     * @param array $orderBy
     * @return array
     */
    public function findBy(array $criteria, array $orderBy = array());

    /**
     * Returns the first matching entity
     * @param array $criteria
     * @return object|null
     */
    public function findOneBy(array $criteria);

    /**
     * Returns the repository entity class name
     * @return string
     */
    public function getClassName();

    /**
     * Hydrate a collection of row and returns
     * a collection of entities
     * @internal
     * @param array $collection
     * @return array
     */
    public function hydrateCollection(array $collection);

    /**
     * Hydrate a single entity
     * @internal
     * @param $entity
     * @return object
     */
    public function hydrate($entity);

    /**
     * Returns the entity Name
     * @return string
     */
    public function getEntityName();
}