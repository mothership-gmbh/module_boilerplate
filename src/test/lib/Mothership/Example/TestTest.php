<?php
/**
 * PHP Version 5.4
 *
 * Class ${NAME}
 *
 * @category  Mothership
 * @package   Mothership_${NAME}
 * @author    Don Bosco van Hoi <vanhoi@mothership.de>
 * @copyright 2015 Mothership GmbH
 * @link      http://www.mothership.de/
 */
use \Mothership\Example\Test;

class TestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Test
     * @group Mothership_Example_Test_1
     */
    public function dumb()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Test
     * @group Mothership_Example_Test_2
     */
    public function sayHey()
    {
        $test = new Test();
        $this->assertEquals($test->sayHey(), 'hey');
    }
}