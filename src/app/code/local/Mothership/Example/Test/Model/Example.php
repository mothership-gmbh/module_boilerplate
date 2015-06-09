<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Mothership GmbH
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Class Mothership_Example_Model_Example
 *
 * @category  Mothership
 * @package   Mothership_Example_Test_Model_Example
 * @author    Don Bosco van Hoi <vanhoi@mothership.de>
 * @copyright 2015 Mothership GmbH
 * @link      http://www.mothership.de/
 */
class Mothership_Example_Test_Model_Example extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Model
     * @group Mothership_Example_Model_Example
     * @group Mothership_Example_Model_Example_1
     *
     * @test
     */
    public function checkModel()
    {
        $this->assertTrue(Mage::getModel('mothership_example/example', new \Mothership\Example\Test()) instanceof Mothership_Example_Model_Example);
        $this->assertTrue(Mage::getModel('mothership_example/example', new \Mothership\Example\Test()) instanceof Varien_Object);
    }

    /**
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Model
     * @group Mothership_Example_Model_Example
     * @group Mothership_Example_Model_Example_2
     *
     * @test
     */
    public function saySomething()
    {
        $this->assertEquals('hey', Mage::getModel('mothership_example/example', new \Mothership\Example\Test())->saySomething());
    }
}