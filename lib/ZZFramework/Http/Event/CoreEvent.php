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


use ZZFramework\Event\Event;
use ZZFramework\Http\HttpProcessorInterface;
use ZZFramework\Http\Request;

class CoreEvent extends Event
{
    private $request;

    private $processor;

    /**
     * CoreEvent constructor.
     * @param $request
     * @param $processor
     */
    public function __construct(Request $request, HttpProcessorInterface $processor)
    {
        $this->request = $request;
        $this->processor = $processor;
    }


    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getProcessor()
    {
        return $this->processor;
    }


}