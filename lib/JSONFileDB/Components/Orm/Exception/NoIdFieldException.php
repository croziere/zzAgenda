<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Orm\Exception;


class NoIdFieldException extends \RuntimeException
{

    /**
     * NoIdFieldException constructor.
     * @param $entity string Entity class name
     */
    public function __construct($entity)
    {
        parent::__construct(sprintf("Entity %s must have property named 'id'!", $entity));
    }
}