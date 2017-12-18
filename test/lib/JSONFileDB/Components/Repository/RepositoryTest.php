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

use JSONFileDB\Components\Orm\Hydrator\HydratorInterface;
use PHPUnit\Framework\TestCase;


class RepositoryTest extends TestCase
{
    const ENTITY_FQN_CLASS = 'JSONFileDB\Components\Mock\MockEntity';
    const ENTITY_SHORT_NAME = 'MockEntity';

    public function test__construct()
    {
        $repo = $this->createRepository(RepositoryTest::ENTITY_FQN_CLASS);

        $this->assertEquals(RepositoryTest::ENTITY_FQN_CLASS, $repo->getClassName());

        $this->assertEquals(RepositoryTest::ENTITY_SHORT_NAME, $repo->getEntityName());

    }

    public function testSupportsClass()
    {
        $repo = $this->createRepository();

        $this->assertTrue($repo->supportsClass(RepositoryTest::ENTITY_FQN_CLASS));
    }

    protected function createRepository($entityClass = RepositoryTest::ENTITY_FQN_CLASS) {
        $mockHydrator = $this->createMock(HydratorInterface::class);

        return new MockRepository($entityClass, $mockHydrator);
    }
}
