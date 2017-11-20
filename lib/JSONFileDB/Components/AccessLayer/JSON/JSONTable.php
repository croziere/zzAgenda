<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\AccessLayer\JSON;


use JSONFileDB\Components\AccessLayer\DataSet;
use JSONFileDB\Components\AccessLayer\Exception\AccessLayerException;
use JSONFileDB\Components\AccessLayer\Table;

class JSONTable implements Table
{
    private $name;
    private $fileExists = false;
    private $path;
    private $db;

    /**
     * @internal
     */
    private $data = null;

    /**
     * JSONTable constructor.
     * @param $name
     * @param $db
     */
    public function __construct($name, JSONDatabase $db)
    {
        $this->name = $name;
        $this->db = $db;

        $this->path = $this->generatePath($db->getDirectory(), $name, $db->getFileExtension());

        if (file_exists($this->path)) {
            $this->load();
        }
    }


    /**
     * Create the table
     */
    public function create()
    {
        if ($this->fileExists) {
            throw new AccessLayerException(sprintf("Table %s already exists! (In %s)", $this->name, $this->path));
        }

        $this->data = array();
        $this->write();
    }

    /**
     * Drop the database
     */
    public function drop()
    {
        if ($this->fileExists) {
            unlink($this->path);
        }
    }

    /**
     * Truncate the table
     */
    public function truncate()
    {
        if (!$this->fileExists) {
            throw new AccessLayerException(sprintf("Tried to truncate table %s but file %s does not exists!", $this->name, $this->path));
        }

        $this->data = array();
        $this->write();
    }

    /**
     * Insert an array to the table
     * @param array $data
     */
    public function insert(array $data)
    {
        $this->data[] = $data;
        $this->write();
    }

    /**
     * Alter the table name
     * @param $newName
     * @throws AccessLayerException
     */
    public function alter($newName)
    {
        if (!$this->fileExists) {
            throw new AccessLayerException(sprintf("Table file %s not found!", $this->path));
        }

        $newPath = $this->generatePath($this->db->getDirectory(), $newName, $this->db->getFileExtension());

        file_put_contents($newPath, json_encode($this->data));
        unlink($this->path);

        $this->path = $newPath;
    }

    /**
     * Select data from the table
     * @return DataSet
     */
    public function select(): DataSet
    {
        return new JSONDataSet($this, func_get_args());
    }

    /**
     * Count data in the table
     * @return int
     * @throws AccessLayerException
     */
    public function count(): int
    {
        if (!$this->fileExists) {
            throw new AccessLayerException(sprintf("Table file %s does not exists!", $this->path));
        }

        return count($this->data);
    }

    /**
     * Returns true if the table exists
     * @return bool
     */
    public function exists(): bool
    {
        return $this->fileExists;
    }

    /**
     * Return the raw table data
     * @return array
     */
    public function raw(): array
    {
        return $this->data;
    }

    /**
     * Write the data to the table
     * @internal
     */
    public function write()
    {
        file_put_contents($this->path, json_encode($this->data));
    }

    /**
     * @internal
     */
    protected function load()
    {
        $this->data = json_decode(file_get_contents($this->path), true);
        $this->fileExists = true;
    }

    /**
     * @internal
     */
    protected function unload()
    {
        $this->data = null;
        $this->fileExists = false;
    }

    /**
     * @internal
     * @param $path
     * @param $name
     * @param $extension
     * @return string
     */
    protected function generatePath($path, $name, $extension)
    {
        return $path . $name . $extension;
    }
}