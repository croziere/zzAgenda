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

class GetResponseForExceptionEvent extends GetResponseEvent
{
    private $exception;

    /**
     * GetResponseForExceptionEvent constructor.
     * @param $exception
     */
    public function __construct(Request $request, HttpProcessorInterface $processor, $exception)
    {
        parent::__construct($request, $processor);
        $this->exception = $exception;
    }

    /**
     * @return mixed
     */
    public function getException()
    {
        return $this->exception;
    }
}