<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace test\lib\ZZFramework\Http;


use PHPUnit\Framework\TestCase;
use ZZFramework\Http\ParametersBag;

class ParametersBagTest extends TestCase
{
    public function testConstruct() {
        $bag = new ParametersBag(array("key" => "value"));
        $this->assertEquals(array("key" => "value"), $bag->all());
    }

    public function testGet() {
        $bag = new ParametersBag(array("key" => "value"));

        $this->assertEquals("value", $bag->get("key"));
    }

    public function testHas() {
        $bag = new ParametersBag(array("key" => "value"));

        $this->assertTrue($bag->has("key"));
        $this->assertFalse($bag->has("uknown"));
    }

    public function testAdd() {
        $bag = new ParametersBag();

        $bag->add("key", "value");

        $this->assertEquals(array("key" => "value"), $bag->all());
    }

    public function testMerge() {
        $bag = new ParametersBag(array("key" => "value"));

        $bag->merge(array("key2" => "value2"));

        $this->assertEquals(array("key" => "value", "key2" => "value2"), $bag->all());
    }

    public function testIterator() {
        $data = array("key" => "value", "key2" => "value2");
        $bag = new ParametersBag($data);

        $i = 0;
        foreach ($bag as $key => $val) {
            ++$i;
            $this->assertEquals($data[$key], $val);
        }

        $this->assertEquals(count($data), $i);
    }

    public function testCount() {
        $data = array("key" => "value", "key2" => "value2");
        $bag = new ParametersBag($data);

        $this->assertEquals(count($data), $bag->count());
    }
}