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
use JSONFileDB\Components\Orm\Hydrator\HydratorInterface;
use JSONFileDB\Components\Orm\Hydrator\ReflectionHydrator;

/**
 * Class Repository
 * Base implementation of commons methods
 * Delegate finding methods to the manager
 * @package JSONFileDB\Components\Repository
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $manager;

    private $name;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $nsPart = explode('\\', $this->getClassName());
        $this->name = end($nsPart);
        $this->hydrator = new ReflectionHydrator($this->getClassName());
    }

    /**
     * Set the manager to use
     * @param EntityManagerInterface $manager
     */
    public function setManager(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        $raw = $this->manager->find($this->getClassName(), $id);

        return $this->hydrate($raw);
    }

    /**
     * Returns true if the $class
     * can be handled by the repository
     * @param $class
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === $this->getClassName();
    }

    /**
     * @inheritdoc
     */
    public function hydrateCollection(array $collection)
    {
        return $this->hydrator->hydrateCollection($collection);
    }

    /**
     * @inheritdoc
     */
    public function findBy(array $criteria, array $orderBy = array())
    {
        $raw = $this->manager->findAll($this->getEntityName(), $criteria, $orderBy);

        return $this->hydrateCollection($raw);
    }

    /**
     * @inheritdoc
     */
    public function findOneBy(array $criteria)
    {
        $raw = $this->manager->findAll($this->getEntityName(), $criteria);

        return $this->hydrate($raw[0]);
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->findBy(array());
    }

    /**
     * @inheritdoc
     */
    public function getEntityName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function hydrate($entity)
    {
        return $this->hydrator->hydrateOne($entity);
    }
}