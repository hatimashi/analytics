<?php

namespace AnalyticsBundle\Tests\unit;

use AnalyticsBundle\Generate\Generate;

class GenerateTest extends \PHPUnit_Framework_TestCase {

//    protected $container;
//    
//    public function setUp(\Symfony\Component\DependencyInjection\Container $container)
//    {
//        $this->container = $container;
//    }
    
    public function testMakeGeneratedUrl() {
        
        $originTestUrl = 'http://onet.pl';
        $time = time();
        $generatedUrl = new Generate();
        $result = $generatedUrl->makeGeneratedUrl($originTestUrl, $time);
        
        $params = array(
            'id'    =>  md5($originTestUrl . $time),
        );
        $expectedResult = '/' . http_build_query($params);
        
        $this->assertEquals($expectedResult, $result);
    }

}
