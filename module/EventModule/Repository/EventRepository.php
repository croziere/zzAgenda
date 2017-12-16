<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EventModule\Repository;


use EventModule\Entity\Event;
use JSONFileDB\Components\Repository\Repository;

class EventRepository extends Repository
{

    public function findOneBy(array $criteria)
    {
        // TODO: Implement findOneBy() method.
    }

    public function getClassName()
    {
        return Event::class;
    }
}