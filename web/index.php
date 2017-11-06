<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\ApplicationKernel;
use ZZFramework\Http\Request;

require_once __DIR__.'/../app/bootstrap.php.cache';
$kernel = new ApplicationKernel('dev', true);

$request = Request::fromContext();
$response = $kernel->handle($request);

$response->send();