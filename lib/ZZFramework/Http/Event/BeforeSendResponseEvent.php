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
use ZZFramework\Http\Response;

class BeforeSendResponseEvent extends CoreEvent
{
    private $response;

    /**
     * BeforeSendResponseEvent constructor.
     * @param Request $request
     * @param HttpProcessorInterface $processor
     * @param Response $response
     */
    public function __construct(Request $request, HttpProcessorInterface $processor, Response $response)
    {
        parent::__construct($request, $processor);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }




}