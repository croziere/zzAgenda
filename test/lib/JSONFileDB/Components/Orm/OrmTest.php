<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace test\lib\JSONFileDB\Components\ORM;

use JSONFileDB\Components\Orm\EntityManagerInterface;
use JSONFileDB\Components\Orm\Hydrator\HydratorInterface;
use JSONFileDB\Components\Orm\Orm;
use JSONFileDB\Components\Repository\MockRepository;

use PHPUnit\Framework\TestCase;

class OrmTest extends TestCase
{

    public function test__construct()
    {
        $orm = new Orm($this->getMockManager());

        $this->assertEquals(array(), $orm->getRepositories());
    }

    public function testGetManager()
    {
        $manager = $this->getMockManager();

        $orm = new Orm($manager);

        $this->assertEquals($manager, $orm->getManager());
    }

    public function testAddAndGetRepositories()
    {
        $repositories = array(
            'Namespace\Entity1' => $this->getMockRepository("Namespace\Entity1"),
            'Namespace\Entity2' => $this->getMockRepository("Namespace\Entity2")
        );

        $orm = new Orm($this->getMockManager());

        foreach ($repositories as $repository) {
            $orm->addRepository($repository);
        }

        $this->assertEquals($repositories, $orm->getRepositories());
    }

    public function testGetRepository()
    {
        $repo = $this->getMockRepository('Namespace\Entity1');
        $orm = new Orm($this->getMockManager());

        $orm->addRepository($repo);

        $this->assertEquals($repo, $orm->getRepository('Namespace\Entity1'));
    }

    protected function getMockManager() {
        return $this->createMock(EntityManagerInterface::class);
    }

    protected function getMockRepository($class) {

        $mockHydrator = $this->createMock(HydratorInterface::class);
        return new MockRepository($class, $mockHydrator);
    }
}
