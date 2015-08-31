<?php

namespace AnalyticsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Snc\RedisBundle\Command\RedisBaseCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use AnalyticsBundle\Entity\Click;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction(Request $request) {

        return $this->redirect($this->generateUrl('sonata_admin_redirect'));
    }

    /**
     * @Route("/incoming/id={id}")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function incomingAction(Request $request, $id) {

        $response = NULL;
        $myTime = time() + 60 * 60 * 24 * 30;
        $redis = $this->container->get('snc_redis.default');
        $cookie = ($request->cookies->get('__ran') !== NULL ) ? $request->cookies->get('__ran') : NULL;

        $clickParams = array(
            'request' => $request,
            'id' => $id,
        );

        $cookieParameters = array(
            'name' => '__ran',
            'value' => md5('__ran' . $myTime),
            'time' => $myTime,
            'path' => '/',
        );

        if (!$cookie) {
            $cookie = new Cookie(
                    $cookieParameters['name'], $cookieParameters['value'], $cookieParameters['time'], $cookieParameters['path']
            );
            $response->headers->setCookie($cookie);
        }

        //Analise
        $params = $this->container->get('analytics.click_analysis')->in($clickParams);

        //Memcache
        if (!$this->get('memcache.default')->replace('click:' . $cookie, 0, 2)) {
            $this->get('memcache.default')->set('click:' . $cookie, 0, 2);
        } else {
            $params['status'] = Click::STATUS_FRAUD;
        }

        //All Clicks
        $redis->incr('click:' . $cookie . ':' . $cookieParameters['time'] . ':' . $id . ':' . $params['status']);

        $clicksArray = $redis->keys('*');
        foreach ($clicksArray as $key) {
            $clickCount[] = array(
            'key' => $key,
            'value' => $redis->get($key),
                );
        }
        foreach($clickCount as $click){
            echo $click;
        }
        die;

        //Create & Save in Database
        $createdRepository = $this->get('click')->create($params);
        if ($this->get('click')->save($createdRepository)) {
            $response = $this->redirect($this->generateUrl('analytics_default_redirect', array('url' => $params['redirectionUrl'])));
//            $response->headers->setCookie($myCookie);
        } else {
            echo 'We can/\'t redirect You.';
        }
        return $response;
    }

    /**
     * @Route("/redirect/{url}", requirements={"url"=".+"})
     * @Template()
     */
    public function redirectAction($url) {

        return $this->redirect($url);
//        return array('url' => $url);
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
     * @Security("has_role('ROLE_USER')")
     */
    public function generateAction(Request $request) {

        $param = null;
        $form = $this->createForm('generate', $param);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $userId = $this->getUser();

            $originUrl = $form["origin_url"]->getData();

            //Factory
            $date = microtime();
            $service = $this->container->get('analytics.generate.factory')->factory();
            try {
                $generatedUrl = $service->makeGeneratedUrl($originUrl, $date);

                $params = array(
                    'userId' => $userId,
                    'originUrl' => $originUrl,
                    'generatedUrl' => $generatedUrl
                );
                //Create & Save
                $create = $this->get('generate')->create($params);
                $this->get('generate')->save($create);

                $response = array('info' => 'Wygenerowano: ' . $generatedUrl);
            } catch (Exception $e) {
                $e->getMessage();
            }
        } else {

            $response = array('form' => $form->createView(), 'info' => 'Fill to generate proper redirection URL');
        }

        return $response;
    }

    /**
     * @Route("/test", name="test")
     * @Template()
     */
    public function testAction(Request $request) {

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
