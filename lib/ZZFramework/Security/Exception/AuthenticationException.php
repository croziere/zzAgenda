<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Security\Exception;


class AuthenticationException extends \RuntimeException implements \Serializable
{


    /**
     * AuthenticationException constructor.
     */
    public function __construct()
    {
        $this->message = 'Wrong email/password!';
    }

    public function serialize()
    {
        return serialize(array(
            $this->code,
            $this->message,
            $this->file,
            $this->line
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->code,
            $this->message,
            $this->file,
            $this->line
            ) = unserialize($serialized);
    }
}