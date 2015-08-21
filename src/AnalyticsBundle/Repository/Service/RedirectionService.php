<?php

namespace AnalyticsBundle\Repository\Service;

use AnalyticsBundle\Entity\Redirection;

class RedirectionService {

    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function create($userId, $originUrl, $generatedUrl) {
        
        return $this->repository->create($userId, $originUrl, $generatedUrl);
    }

//    public function update(Redirection $redirection) {
//    
//        return $this->container->create($redirection);
//    }
    
    public function save($redirection) {
    
        return $this->repository->save($redirection);
    }

}
