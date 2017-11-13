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
    private $content;

    /**
     * Response constructor.
     * @param $content
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }


    public function send() {
        echo $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}