<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http\Event;


use ZZFramework\Http\HttpProcessorInterface;
use ZZFramework\Http\Request;

class GetResponseFromResultEvent extends GetResponseEvent
{
    private $raw;

    public function __construct(Request $request, HttpProcessorInterface $processor, $raw)
    {
        parent::__construct($request, $processor);
        $this->raw = $raw;
    }

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }
}