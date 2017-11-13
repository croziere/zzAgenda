<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require __DIR__.'/../vendor/autoload.php';
$loader = require __DIR__.'/../lib/autoload.php';
$loader->addFile('App\ApplicationKernel', 'app/ApplicationKernel.php');
return $loader;