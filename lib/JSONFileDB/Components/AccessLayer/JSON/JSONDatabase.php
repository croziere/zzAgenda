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


use JSONFileDB\Components\AccessLayer\Database;
use JSONFileDB\Components\AccessLayer\Exception\AccessLayerException;

class JSONDatabase implements Database
{
    const READ_ONLY = 'r';
    const READ_WRITE = 'rw';

    private $directory;
    private $mode;
    private $fileExtension;
    private $tables = array();

    /**
     * JSONDatabase constructor.
     * @param string $databaseDirectory
     * @param string $databaseMode
     * @param string $databaseFileExtension
     * @throws AccessLayerException
     */
    public function __construct($databaseDirectory = './db', $databaseMode = JSONDatabase::READ_WRITE, $databaseFileExtension = 'json')
    {
        if(!is_dir($databaseDirectory)) {
            throw new AccessLayerException(sprintf("Directory %s does not exists!", $databaseDirectory));
        }

        if(!in_array($databaseMode, array('r', 'rw'))) {
            throw new AccessLayerException(sprintf("Database mode must be 'w' or 'rw'. %s given!", $databaseMode));
        }


        $this->directory = $databaseDirectory;
        $this->mode = $databaseMode;
        $this->fileExtension = substr($databaseFileExtension, 0, 1) != '.' ? '.'.$databaseFileExtension : $databaseFileExtension;
    }

    public function getTable($name)
    {
        if (!$this->tables[$name]) {
            $this->tables[$name] = new JSONTable($name, $this);
        }

        return $this->tables[$name];
    }

    public function getTables()
    {
        $tables = array();

        if($dir = opendir($this->directory)) {
            while (($file = readdir($dir)) !== false) {
                if(strstr($file, $this->fileExtension)) {
                    $tables[] = str_replace($this->fileExtension, '', $file);
                }
            }
            closedir($dir);
        }

        return $tables;
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->directory;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @return string
     */
    public function getFileExtension(): string
    {
        return $this->fileExtension;
    }


    public function commit()
    {
        foreach ($this->tables as $table) {
            $table->write();
        }
    }
}