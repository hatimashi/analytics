<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Snc\RedisBundle\Command\RedisBaseCommand;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
     * @Route("/test", name="test")
     * @Template()
     */
    public function testAction(Request $request) {
        
        $string1 = md5("Hello");
        $string2 = md5("Hello");
        
        
//        $redis = new Redis();
        $redis = $this->container->get('snc_redis.default');
        $redisRow = $redis->get(1);
        
        return array(
            'string1' => $string1,
            'string2' => $string2,
            'redisRow' => $redisRow
        );
    }
}
