<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/**
 * Class LibsAutoloader
 * Create and load the Classloader
 * @see Autoload/ClassLoader
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class LibsAutoloader
{

    private static $loader;

    public static function registerClassLoader($class) {
        if('Autoload/ClassLoader' === $class) {
            require_once __DIR__.'/ClassLoader.php';
        }
    }

    public static function getLoader() {
        if(null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('LibsAutoloader', 'registerClassLoader'), true, true);
        self::$loader = new \Autoload\ClassLoader();
        spl_autoload_unregister(array('LibsAutoloader', 'registerClassLoader'));

        self::$loader->register();

        $files = require __DIR__.'/required_files.php';
        foreach ($files as $file) {
            requireFile($file);
        }

        return self::$loader;
    }
}

function requireFile($file) {
    require $file;
}