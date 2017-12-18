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
use UserModule\Entity\User;

error_reporting(E_ERROR);

require_once __DIR__.'/bootstrap.php.cache';

$kernel = new ApplicationKernel('dev', true);
$kernel->boot();

$database = $kernel->getContainer()->get('database');

$userTable = $database->getTable("user");

$eventTable = $database->getTable("event");

if ($userTable->exists() === true) {
    echo "Dropping user database".PHP_EOL;
    $userTable->drop();
}

if ($eventTable->exists() === true) {
    echo "Dropping event database".PHP_EOL;
    $eventTable->drop();
}

$userTable->create();
$eventTable->create();

$orm = $kernel->getContainer()->get('orm');

$defaultUser = new User();

$defaultUser->setUsername("david");
$defaultUser->setPassword('$2y$10$J228QvLido7qTdo/PY5GSOEKykBCWJ1yqSsn.qnYA.IK0ozUzxLEK'); //david
$defaultUser->setSalt("");
$defaultUser->setIsAdmin(true);

$orm->getManager()->persist($defaultUser);

$orm->getManager()->flush();

echo "Default user david/david created!".PHP_EOL;
echo "Default database created!".PHP_EOL;
