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


interface EntityManagerInterface
{
    public function find($name, $id);

    public function remove($entity);

    public function persist($entity);

    public function flush();

    public function findAll($entity, $criteria);

}