<?php

namespace AnalyticsBundle\Repository\Service;

class RedirectionService {

    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function create($params) {
        
        return $this->repository->create($params);
    }
    
    public function save($redirection) {
    
        return $this->repository->save($redirection);
    }
    
    public function findRedirection($entityName, $redirectionId) {
        return $this->repository->findRedirection($entityName, $redirectionId);
    }
    
    public function findEntity($entityName, $column) {
        return $this->repository->findEntity($entityName, $column);
    }
    
}
