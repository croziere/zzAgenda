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

use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{

    public function test__construct()
    {

    }

    public function testSetManager()
    {

    }

    public function testFind()
    {

    }

    public function testSupportsClass()
    {

    }

    public function testHydrateCollection()
    {

    }

    public function testFindBy()
    {

    }

    public function testFindAll()
    {

    }

    public function testGetEntityName()
    {

    }

    public function testHydrate()
    {

    }

    protected function createRepository() {
        $stubRepository = $this->getMockForAbstractClass(Repository::class, array(), '', false);

        $stubRepository->expects($this->any())
            ->method('getClassName')
            ->willReturn('Namespace1/Namespace2/TestEntity');
    }
}
