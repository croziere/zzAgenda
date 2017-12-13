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


class RedirectResponse extends Response
{
    protected $redirectUrl;

    /**
     * RedirectResponse constructor.
     * @param $redirectUrl
     * @param int $statusCode
     */
    public function __construct($redirectUrl, $statusCode = Response::HTTP_MOVED_PERMANENTLY)
    {
        parent::__construct('', $statusCode);

        $this->setRedirectUrl($redirectUrl);
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param mixed $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        if(empty($redirectUrl)) {
            throw new \InvalidArgumentException("Cannot redirect to an empty url!");
        }

        $this->redirectUrl = $redirectUrl;

        $this->headers->set('Location', $redirectUrl);
    }


}