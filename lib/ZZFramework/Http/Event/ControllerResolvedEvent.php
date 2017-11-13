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

class ControllerResolvedEvent extends CoreEvent
{
    private $controller;

    /**
     * ControllerResolvedEvent constructor.
     * @param $controller
     */
    public function __construct(Request $request, HttpProcessorInterface $processor, $controller)
    {
        parent::__construct($request, $processor);
        $this->controller = $controller;
    }


    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        $this->stop();
    }


}