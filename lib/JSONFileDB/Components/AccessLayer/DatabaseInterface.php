<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\AccessLayer;

/**
 * Interface Database
 * Represents a database made of tables
 * @package JSONFileDB\Components\AccessLayer
 */
interface DatabaseInterface
{
    /**
     * @param $name
     * @return Table
     */
    public function getTable($name);

    /**
     * Returns all available table name
     * @return array
     */
    public function getTables();

    /**
     * Commit the changes to the db
     */
    public function commit();
}