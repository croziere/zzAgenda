<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\AccessLayer;


interface DataSet
{
    public function fetch($includeId = true);

    public function count();

    public function delete();

    public function update();

    public function sort($sortFn = null);
}