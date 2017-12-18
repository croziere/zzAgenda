<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\AccessLayer\Id;


use Ramsey\Uuid\Uuid;

class UuidGenerator implements IdGeneratorInterface
{

    public function generateNext()
    {
        return Uuid::uuid4()->toString();
    }
}