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
 * Class Mothership_Example_Test_Config_Main
 *
 * @category  Mothership
 * @package   Mothership_Example_Test_Config_Main
 * @author    Don Bosco van Hoi <vanhoi@mothership.de>
 * @copyright 2015 Mothership GmbH
 * @link      http://www.mothership.de/
 *
 *            Generic module tests
 */
class Mothership_Example_Test_Config_Main extends EcomDev_PHPUnit_Test_Case_Config
{
    /**
     * Check that all class aliases are defined correctly
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Config
     * @group Mothership_Example_Config_1
     *
     * @test
     */
    public function checkModuleSettings()
    {
        $this->assertModuleCodePool('local');
        $this->assertModuleVersion('1.0.0');

        foreach ($this->expected('module')->getDepends() as $depend) {
            $this->assertModuleIsActive('', $depend);
            $this->assertModuleDepends($depend);
        }
    }

    /**
     * Check registered events
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Config
     * @group Mothership_Example_Config_2
     *
     * @test
     */
    public function checkRegisteredEvents()
    {
        $this->assertEventObserverDefined('global', 'controller_action_predispatch', 'mothership_example/observer', 'preDispatch');
    }

    /**
     * Check that all class aliases are defined correctly
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Config
     * @group Mothership_Example_Config_3
     *
     * @test
     */
    public function checkClassAliases()
    {
        $this->assertHelperAlias(
            'mothership_example',
            'Mothership_Example_Helper_Data'
        );

        $this->assertModelAlias(
            'mothership_example/example',
            'Mothership_Example_Model_Example'
        );

        $this->assertTrue(Mage::getModel('mothership_example/example', new \Mothership\Example\Test()) instanceof Mothership_Example_Model_Example);
        $this->assertTrue(Mage::getModel('mothership_example/example', new \Mothership\Example\Test()) instanceof Varien_Object);
    }

    /**
     * Checks that all layout files are defined,
     * for both areas frontend and adminhtml
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Config
     * @group Mothership_Example_Config_4
     *
     * @test
     */
    public function checkLayoutFileDefinitions()
    {
        $this->assertLayoutFileDefined(EcomDev_PHPUnit_Model_App::AREA_FRONTEND,
            'mothership/example.xml', 'mothership_example');

        $this->assertLayoutFileExistsInTheme(
            EcomDev_PHPUnit_Model_App::AREA_FRONTEND,
            'mothership/example.xml',
            'default',
            'base'
        );
    }

    /**
     * Check, that the Checkout-Extension is enabled
     *
     * @group Mothership
     * @group Mothership_Example
     * @group Mothership_Example_Config
     * @group Mothership_Example_Config_5
     *
     * @test
     */
    public function checkDefaultConfiguration()
    {
        $this->assertConfigNodeValue(
            'default/example/options/mothership_example_extension_enabled',
            1
        );
    }
}