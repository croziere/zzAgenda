<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Autoload;

/**
 * Class ClassLoader
 * Dynamic PSR-0 Class loader
 * @package Autoload
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class ClassLoader
{
    private $fileMap = array();

    /**
     * Add a class php file to the map
     * @param $namespace
     * @param $file
     */
    public function addFile($namespace, $file) {
        $this->fileMap[$namespace] = __DIR__.'/../../'.$file;
    }

    /**
     * Load a class (with PSR-O)
     * @param $class
     * @return bool|void
     */
    public function loadClass($class) {
        if(isset($this->fileMap[$class])) {
            includeFile($this->fileMap[$class]);
            return true;
        }

        return $this->findFile($class);
    }

    /**
     * Register this classloader
     */
    public function register() {
        spl_autoload_register(array($this, 'loadClass'), true, true);
    }

    /**
     * Try to find a file in lib or module directory
     * @param $class
     */
    public function findFile($class) {
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        $root = __DIR__.'/../../';

        $fileLibs = $root.'lib/'.$path.'.php';
        if(file_exists($fileLibs)) {
            includeFile($fileLibs);
            return;
        }

        $fileModules = $root.'module/'.$path.'.php';
        if(file_exists($fileModules)) {
            includeFile($fileModules);
            return;
        }
    }
}

/**
 * Include a file
 * @param $file
 */
function includeFile($file) {
    include $file;
}