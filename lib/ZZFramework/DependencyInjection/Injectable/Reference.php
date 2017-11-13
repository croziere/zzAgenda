<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\DependencyInjection\Injectable;


class Reference
{
    private $id;

    public function __construct($id) {
        $this->id = strtolower($id);
    }

    public function __toString()
    {
        return $this->id;
    }
}