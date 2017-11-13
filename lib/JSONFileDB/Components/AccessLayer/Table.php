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


interface Table
{
    /**
     * Create the table
     */
    public function create();

    /**
     * Drop the database
     */
    public function drop();

    /**
     * Truncate the table
     */
    public function truncate();

    /**
     * Insert an array to the table
     * @param array $data
     */
    public function insert(array $data);

    /**
     * Alter the table name
     * @param $newName
     */
    public function alter($newName);

    /**
     * Select data from the table
     * @return DataSet
     */
    public function select(): DataSet;

    /**
     * Count data in the table
     * @return int
     */
    public function count(): int;

    /**
     * Returns true if the table exists
     * @return bool
     */
    public function exists(): bool;

    /**
     * Return the raw table data
     * @return array
     */
    public function raw(): array;

    /**
     * Write the data to the table
     * @internal
     */
    public function write();
}