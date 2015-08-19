<?php

namespace AnalyticsBundle\Generate;

class GenerateFactory {
    
    protected $container;
    
    public function __construct($container) {
        $this->container = $container;
    }
    
    public function factory()
    {
        $service = $this->container->get('analytics.generate');
        $service->setSystemUrl($this->container->getParameter('system_url'));
        
        return $service;
    }
}

