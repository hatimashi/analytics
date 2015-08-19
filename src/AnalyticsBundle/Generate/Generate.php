<?php

namespace AnalyticsBundle\Generate;

class Generate extends GenerateAbstract{
    
    public function makeGeneratedUrl($originUrl, $created, $params = array()) {
        
        $generatedId = $this->generate($originUrl, $created);
        
        $params = array(
            'id' => $generatedId,
        );
        
        $generatedUrl = $this->systemUrl . '?' . http_build_query($params);
    
        
        return $generatedUrl;
    }
}

