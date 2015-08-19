<?php

namespace AnalyticsBundle\Generate;

abstract class GenerateAbstract implements GenerateInterface {

    protected $systemUrl;

    public function setSystemUrl($systemUrl) {
        $this->systemUrl = $systemUrl;
    }

    public function getSystemUrl() {
        return $this->systemUrl;
    }

    public function generate($originUrl, $created) {

        $generatedId = md5($originUrl . $created);

        return $generatedId;
    }

}
