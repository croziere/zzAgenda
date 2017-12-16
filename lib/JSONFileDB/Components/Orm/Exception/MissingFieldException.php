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

/**
 * Class MissingFieldException
 * Thrown when a class doesn't have a field required
 * @package JSONFileDB\Components\Orm\Exception
 * @author Benjamin Roziere <benjamin.roziere@ov-corporation.com>
 */
class MissingFieldException extends \RuntimeException
{

    /**
     * MissingFieldException constructor.
     * @param $field string
     * @param $entity string
     */
    public function __construct($field, $entity)
    {
        parent::__construct(sprintf("Entity %s has no property named %s!", $entity, $field));
    }
}