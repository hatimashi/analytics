<?php

namespace AnalyticsBundle\Repository\Service;

use AnalyticsBundle\Entity\Redirection;

class RedirectionService {

    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function create($userId, $originUrl, $generatedUrl) {
        $redirection = new Redirection();
        
        $redirection->setUserId($userId);
        $redirection->setOriginUrl($originUrl);
        $redirection->setGeneratedUrl($generatedUrl);
        
        return $redirection;
    }

    public function update(Redirection $redirection) {
    
        return $this->container->create($redirection);
    }
    
    public function save($redirection) {
    
        return $this->repository->save($redirection);
    }

}
