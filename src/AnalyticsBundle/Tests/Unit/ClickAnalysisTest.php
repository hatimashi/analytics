<?php

namespace AnalyticsBundle\Tests\unit;

use AnalyticsBundle\Analysis\ClickAnalysis;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClickAnalysisTest extends \PHPUnit_Framework_TestCase {

    protected $request;
    
    public function setUp()
    {
//        $webTestCase = new \Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase();
//        $client = $webTestCase::createClient();
//        $client = static::createClient();
//        $client->get
//        $this->request = $request;
    }
    
    public function testMakeGeneratedUrl() {
        
        $clickParams = array(
            'request'   =>  $this->request,
            'id'        =>  '555',
        );
        
        $clickAnalysis = new ClickAnalysis();
        $returnedArray = $clickAnalysis->analysis($clickParams);
        
        $this->assertNotEmpty($returnedArray);
    }

}
