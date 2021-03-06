<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Orm;


use JSONFileDB\Components\Repository\Repository;
use JSONFileDB\Components\Repository\RepositoryInterface;
use ZZFramework\Http\ParametersBag;

/**
 * Class Orm
 * Orm handling repository <-> EntityManager relations
 * Facade to the orm system
 * @package JSONFileDB\Components\Orm
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class Orm
{
    protected $entityManager;

    /**
     * @var ParametersBag
     */
    protected $repositories;

    /**
     * Orm constructor.
     * @param $entityManager EntityManagerInterface
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositories = new ParametersBag();
    }

    /**
     * @return EntityManagerInterface
     */
    public function getManager()
    {
        return $this->entityManager;
    }

    /**
     * @return array
     */
    public function getRepositories()
    {
        return $this->repositories->all();
    }

    /**
     * @param RepositoryInterface $repository
     */
    public function addRepository(RepositoryInterface $repository)
    {
        if ($repository instanceof Repository) {
            $repository->setManager($this->entityManager);
        }

        $this->repositories->set($repository->getClassName(), $repository);
    }

    /**
     * @param $class
     * @return Repository
     */
    public function getRepository($class) {
        return $this->repositories->get($class);
    }
}