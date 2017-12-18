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
 * Interface DataSet
 * Wraps an array of raw data
 * Hold the state of the table content
 * Data representation must have a unique id field
 * @package JSONFileDB\Components\AccessLayer
 */
interface DataSet
{
    /**
     * Returns one row of data of id $id or null
     * @param $id
     * @return mixed|null
     */
    public function fetchOne($id);

    /**
     * Returns all the rows
     * @return array
     */
    public function fetchAll();

    /**
     * Count the rows
     * @return int
     */
    public function count();

    /**
     * Add or update a row with $data
     * @param $id
     * @param $data
     * @return mixed Last inserted id
     */
    public function set($id, $data);

    /**
     * Delete a row
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Fill the DataSet with data
     * @param $raw
     * @return mixed
     */
    public function fill($raw);

    /**
     * Returns the raw data to write
     * @return string
     */
    public function write();
}