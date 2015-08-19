<?php

namespace AnalyticsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Snc\RedisBundle\Command\RedisBaseCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction(Request $request) {

        return $this->redirect($this->generateUrl('sonata_admin_redirect'));
    }

    /**
     * @Template()
     */
    public function incomingAction($param) {
        
    }

    /**
     * @Template()
     */
    public function redirectAction($param) {
        
    }

    /**
     * @Route("/analysis")
     * @Template()
     */
    public function analysisAction($param) {

//        return $this->redirect($this->generateUrl('analytics.analysis'));
    }

    /**
     * @Route("/generate")
     * @Template()
     */
    public function generateAction(Request $request) {

        $param = null;
        $userId = $this->getUser();
        
        $form = $this->createForm('generate', $param);
        $form->handleRequest($request);
        
        $originUrl = $request->request->get('origin_url');
        
        if ($form->isValid()) {
            //Factory
            $date = \DateTime::ATOM;
            $service = $this->container->get('analytics.generate.factory')->factory();
            $generatedUrl = $service->makeGeneratedUrl($originUrl, $date);
            
            //Create and Save
            $create = $this->get('generate')->create($userId, $originUrl, $generatedUrl);
            $this->get('generate')->save($create);
            $response = array('info' => 'Wygenerowano: ' . $generatedUrl);
        }else {
            
            $response = array('form' => $form->createView(), 'info' => 'Fill to generate proper redirection URL');
        }

        return $response;
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
        $redis->set(1, 'jedynka');
        $redisRow = $redis->get(1);

        return array(
            'string1' => $string1,
            'string2' => $string2,
            'redisRow' => $redisRow
        );
    }

}
