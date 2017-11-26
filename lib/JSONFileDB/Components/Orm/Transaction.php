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

final class Transaction
{
    private $em;

    private $database;


    /**
     * Transaction constructor.
     * @param $em
     */
    public function __construct(EntityManagerInterface $em, Database $database)
    {
        $this->em = $em;
        $this->database = $database;
    }

    public function commit() {

    }

}