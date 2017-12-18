<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JSONFileDB\Components\Repository;


final class MockRepository extends Repository
{

    private $stubEntityClass;

    /**
     * MockRepository constructor.
     * @param string $stubEntityClass
     * @param null $hydrator
     */
    public function __construct(string $stubEntityClass, $hydrator = null)
    {
        $this->stubEntityClass = $stubEntityClass;

        parent::__construct($hydrator);
    }


    /**
     * Returns the repository entity class name
     * @return string
     */
    public function getClassName()
    {
        return $this->stubEntityClass;
    }
}