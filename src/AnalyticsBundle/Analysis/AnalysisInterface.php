<?php

namespace AnalyticsBundle\Analysis;

interface AnalysisInterface {
    
    public function in($clickParams);
    public function analysis($param);
    public function out($parameters);
}
