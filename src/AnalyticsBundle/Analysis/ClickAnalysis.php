<?php

namespace AnalyticsBundle\Analysis;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

use AnalyticsBundle\Entity\Click;

class ClickAnalysis extends AnalysisAbstract {

    protected $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function in($clickParams) {
        
        return self::analysis($clickParams);
    }
    
    public function analysis($clickParams) {
        
        $referer = $clickParams['request']->server->get('HTTP_REFERER') ? $clickParams['request']->server->get('HTTP_REFERER') : 'SELF';
        $redirectionEntityInfo = $this->container->get('generate')->findRedirection('AnalyticsBundle:Redirection', $referer);
        
        $ip = $clickParams['request']->server->get('REMOTE_ADDR');
        $userAgent = $clickParams['request']->server->get('HTTP_USER_AGENT');
        

        
        if(!$redirectionEntityInfo['redirection']){
            return false;
        }else{
            $parameters = array(
                'redirectionId' => $redirectionEntityInfo['redirection'],
                'userSession' => '',
                'referer' => $referer,
                'ip' => $ip,
                'userAgent' => $userAgent,
                'redirectionUrl' => $redirectionEntityInfo['redirectionUrl'],//Only for redirect not to save.
                'status' => Click::STATUS_OK,
            );
            
            return self::out($parameters);
        }
    }
    
    public function out($parameters) {
        
        return $parameters;
    }

}
