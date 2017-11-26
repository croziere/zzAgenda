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


use JSONFileDB\Components\Orm\EntityManagerInterface;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $manager;

    private $name;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->name = end(explode('\\', $this->getClassName()));
    }


    public function setManager(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }

    public function find($id)
    {
        $this->manager->find($this->getClassName(), $id);
    }

    /**
     * @param $class
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === $this->getClassName();
    }

    public function hydrateCollection(array $collection)
    {
        $resultSet = array();
        foreach ($collection as $entity) {
            $resultSet[] = $this->hydrate($entity);
        }

        return $resultSet;
    }

    public function findBy(array $criteria)
    {
        $raw = $this->manager->findAll($this->getEntityName(), $criteria);

        return $this->hydrateCollection($raw);
    }

    public function findAll()
    {
        return $this->findBy(array());
    }

    public function getEntityName()
    {
        return $this->name;
    }


}