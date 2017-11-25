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

class EntityManager implements EntityManagerInterface
{
    private $database;

    private $transaction;

    /**
     * EntityManager constructor.
     * @param $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->transaction = new Transaction($this);
    }


    public function find($name, $id)
    {

    }

    public function remove($entity)
    {

    }

    public function persist($entity)
    {

    }

    public function flush()
    {
        $this->transaction->commit();
    }
}