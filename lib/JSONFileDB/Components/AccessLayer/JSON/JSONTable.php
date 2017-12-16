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
     * @var DataSet
     */
    private $data = null;

    /**
     * JSONTable constructor.
     * @param $name
     * @param $db
     */
    public function __construct($name, JSONDatabase $db)
    {
        $this->name = strtolower($name);
        $this->db = $db;

        $this->path = $this->generatePath($db->getDirectory(), $this->name, $db->getFileExtension());

        if (file_exists($this->path)) {
            $this->load();
        }
    }


    /**
     * Create the table
     * @throws AccessLayerException
     */
    public function create()
    {
        if ($this->fileExists) {
            throw new AccessLayerException(sprintf("Table %s already exists! (In %s)", $this->name, $this->path));
        }

        $this->data = new JSONDataSet($this, '[]');
        $this->write();
    }

    /**
     * Drop the database
     */
    public function drop()
    {
        if ($this->fileExists) {
            unlink($this->path);
            $this->data = null;
            $this->fileExists = false;
        }
    }

    /**
     * Truncate the table
     * @throws AccessLayerException
     */
    public function truncate()
    {
        if (!$this->fileExists) {
            throw new AccessLayerException(sprintf("Tried to truncate table %s but file %s does not exists!", $this->name, $this->path));
        }

        $this->data = new JSONDataSet($this, '[]');
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

        $newName = strtolower($newName);

        $oldPath = $this->path;
        $this->path = $this->generatePath($this->db->getDirectory(), $newName, $this->db->getFileExtension());

        $this->write();
        unlink($oldPath);
    }

    /**
     * Select data from the table
     * @return DataSet
     * @throws AccessLayerException
     */
    public function select(): DataSet
    {
        if (!$this->fileExists) {
            throw new AccessLayerException(sprintf("Table file %s does not exists!", $this->path));
        }

        return $this->data;
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

        return $this->data->count();
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
     * Write the data to the table
     * @internal
     * @throws AccessLayerException
     */
    public function write()
    {
        if (!$this->fileExists) {
            throw new AccessLayerException(sprintf("Table file %s does not exists!", $this->path));
        }

        file_put_contents($this->path, $this->data->write());
    }

    /**
     * @internal
     */
    protected function load()
    {
        $this->data = new JSONDataSet($this, file_get_contents($this->path));
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