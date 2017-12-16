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


interface RepositoryInterface
{
    public function find($id);

    public function findAll();

    public function findBy(array $criteria, array $orderBy = array());

    public function findOneBy(array $criteria);

    public function getClassName();

    public function hydrateCollection(array $collection);

    public function hydrate($entity);

    public function getEntityName();
}