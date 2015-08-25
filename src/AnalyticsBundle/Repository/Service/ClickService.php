<?php

namespace AnalyticsBundle\Repository\Service;

class ClickService {

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

}
