<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace test\lib\ZZFramework\Application;

use PHPUnit\Framework\TestCase;
use ZZFramework\Application\AbstractApplicationKernel;

final class AbstractApplicationKernelTest extends TestCase
{
    public function testKernelInitialization()
    {
        $stubKernel = $this->createKernel('prod', false);

        $this->assertFalse($stubKernel->isDebug());
        $this->assertEquals('prod', $stubKernel->getEnvironment());
    }

    public function testRootDir() {
        $stubKernel = $this->createKernel();

        $r = new \ReflectionObject($stubKernel);
        $expectedRootDir = dirname($r->getFileName());

        $this->assertEquals($expectedRootDir, $stubKernel->getAppRootDir());
    }

    public function testCacheDir() {
        $stubKernel = $this->createKernel();

        $expectedCacheDir = $stubKernel->getAppRootDir().'/cache/';

        $this->assertEquals($expectedCacheDir, $stubKernel->getCacheDir());
    }

    public function testNotInitializedModules() {
        $stubKernel = $this->createKernel();

        $this->assertNull($stubKernel->getModule('test'));
        $this->assertCount(0, $stubKernel->getModules());
    }


    /**
     * @param $env
     * @param $debug
     * @return \PHPUnit_Framework_MockObject_MockObject|AbstractApplicationKernel
     */
    protected function createKernel($env = 'dev', $debug = true)
    {
        $stubKernel = $this->getMockForAbstractClass(AbstractApplicationKernel::class, array($env, $debug));

        $stubKernel->expects($this->any())
            ->method('registerModules')
            ->will($this->returnValue(array()));

        return $stubKernel;
    }
}