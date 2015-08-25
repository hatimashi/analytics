<?php

namespace AnalyticsBundle\Analysis;

class ClickAnalysis extends AnalysisAbstract {

    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function in($clickParams) {
        
        return self::analysis($clickParams);
    }
    
    public function analysis($clickParams) {
        
        $referer = $clickParams['request']->server->get('HTTP_REFERER');
        $redirectionEntityInfo = $this->repository->get('generate')->findRedirection('AnalyticsBundle:Redirection', $referer);
        
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
            );
            
            return self::out($parameters);
        }
    }
    
    public function out($parameters) {
        
        return $parameters;
    }

}
