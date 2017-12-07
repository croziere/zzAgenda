<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Security\User;


interface UserInterface
{
    public function getUsername();

    public function getPassword();

    public function getSalt();

    public function getRoles();
}