<?php

namespace AnalyticsBundle\Statistic;

abstract class StatisticAbstract implements StatisticInterface {

    protected $repository;
    protected $fieldsToFiter;

    public function setRepository($repository) {
        $this->repository = $repository;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setQuery($repository, $fieldsToFiter) {
        
    }
}
