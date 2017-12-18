<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http\Exception;


class HttpException extends \RuntimeException implements HttpExceptionInterface
{
    private $statusCode;

    /**
     * HttpException constructor.
     * @param $statusCode
     * @param null $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($statusCode, $message = null, $code = 0, \Exception $previous = null)
    {
        $this->statusCode = $statusCode;

        parent::__construct($message, $code, $previous);
    }


    public function getStatusCode()
    {
        return $this->statusCode;
    }
}