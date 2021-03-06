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

class AccessDeniedException extends AuthenticationException
{

    /**
     * AccessDeniedException constructor.
     */
    public function __construct($message = 'Access Denied!', \Exception $previous = null)
    {
        parent::__construct();

        $this->message = $message;
        $this->code = 403;
    }
}