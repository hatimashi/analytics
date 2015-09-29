<?php

namespace AnalyticsBundle\Statistic;

interface StatisticInterface {
    public function setQuery($repository, $fieldsToFiter);
//    public function getResult();
}