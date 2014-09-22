<?php
namespace BlurTest\Helper;

use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Service\ServiceManagerConfig;

class ContentHelperTest extends \PHPUnit_Framework_TestCase
{
    protected $helperInstance;

    protected $serviceLocator;

    public function setUp()
    {
        // Create Service Locator & inject config service
        $this->serviceLocator = new ServiceManager(new ServiceManagerConfig());

        // Create Instance to test
        $this->helperInstance = new \Blur\Helper\ContentHelper();
        $this->helperInstance->setServiceLocator($this->serviceLocator);
    }

    /**
     * @dataProvider providerHyphenizeGood
     */
    public function testHyphenizeGood($text, $length, $cutWord, $expectedResult) {
        $result = $this->helperInstance->hyphenize($text, $length, $cutWord);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerHyphenizeGood() {
        return [
            // Text small enough not to be affected
            ['This is a short text', 50, true, 'This is a short text'],
            ['This is a short text', 50, false, 'This is a short text'],
            ['Short text this is a', 50, true, 'Short text this is a'],
            ['Short text this is a', 50, false, 'Short text this is a'],
            // Text of the length of length
            ['This is a thirty six character text.', 36, true, 'This is a thirty six character text.'],
            ['This is a thirty six character text.', 36, false, 'This is a thirty six character text.'],
            ['Thirty six character text this is a.', 36, true, 'Thirty six character text this is a.'],
            ['Thirty six character text this is a.', 36, false, 'Thirty six character text this is a.'],
            // Text of 1 character less than the length
            ['This is a thirty six character text.', 35, true, 'This is a thirty six character t...'],
            ['This is a thirty six character text.', 35, false, 'This is a thirty six character...'],
            ['Thirty six character text this is a.', 35, true, 'Thirty six character text this i...'],
            ['Thirty six character text this is a.', 35, false, 'Thirty six character text this is...'],
        ];
    }

    public function testGetCountryFlagUrlFromCountryCode() {
        $config = ['flag_img_base_url' => 'http://www.base.url/'];
        $this->serviceLocator->setService('config', $config);

        $result = $this->helperInstance->getCountryFlagUrlFromCountryCode('GBP');
        $expectedResult = 'http://www.base.url/GBP.png';

        $this->assertEquals($expectedResult, $result);
    }
}
