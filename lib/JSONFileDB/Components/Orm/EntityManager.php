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


use JSONFileDB\Components\AccessLayer\Database;
use JSONFileDB\Components\Orm\Serializer\ArrayEntitySerializer;
use JSONFileDB\Components\Query\Query;

class EntityManager implements EntityManagerInterface
{
    private $database;

    private $transaction;

    private $serializer;

    /**
     * EntityManager constructor.
     * @param $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->transaction = new Transaction($this, $database);
        $this->serializer = new ArrayEntitySerializer();
    }


    public function find($name, $id)
    {
        $dataSet = $this->database->getTable($this->getTableNameFromClass($name))->select();

        return $dataSet->fetchOne($id);
    }

    public function remove($entity)
    {
        $this->database->getTable($this->getTableNameFromEntity($entity))->select()->delete($entity->getId());
    }

    public function persist($entity)
    {
        $serialized = $this->serializer->serialize($entity);

        return $this->database->getTable($this->getTableNameFromEntity($entity))->select()->set($entity->getId(), $serialized);
    }

    public function flush()
    {
        $this->database->commit();
    }

    public function findAll($entity, array $criteria, array $orderBy = array())
    {
        $dataSet = $this->database->getTable($this->getTableNameFromClass($entity))->select();

        $query = new Query($dataSet, $criteria, $orderBy);

        return $query->getResults();
    }

    private function getTableNameFromClass($class) {
        $nsPart = explode('\\', $class);
        return end($nsPart);
    }

    private function getTableNameFromEntity($entity) {
        return $this->getTableNameFromClass(get_class($entity));
    }
}