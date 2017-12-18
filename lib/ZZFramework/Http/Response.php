<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http;


class Response
{
    const HTTP_OK = 200;
    const HTTP_NO_CONTENT = 204;

    const HTTP_MOVED_PERMANENTLY = 301;

    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_I_AM_A_TEAPOT = 418; //Most useful status code ever!

    const HTTP_INTERNAL_SERVER_ERROR = 500;

    /**
     * @var ParametersBag
     */
    public $headers;

    /**
     * @var string
     */
    protected $content;

    protected $statusCode;


    /**
     * Response constructor.
     * @param string $content
     * @param int $statusCode
     */
    public function __construct($content = '', $statusCode = Response::HTTP_OK)
    {
        $this->headers = new ParametersBag();
        $this->statusCode = $statusCode;
        $this->content = $content;
    }


    private function sendHeaders() {
        if (headers_sent()) {
            return;
        }

        foreach ($this->headers as $key => $value) {
            header($key.': '.$value, false, $this->statusCode);
        }
    }

    public function send() {
        $this->sendHeaders();

        echo $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }


}