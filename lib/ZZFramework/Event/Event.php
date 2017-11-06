<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Event;


class Event
{
    private $stopPropagation = false;

    public function stop() {
        $this->stopPropagation = true;
    }

    public function isStopped() {
        return $this->stopPropagation;
    }
}