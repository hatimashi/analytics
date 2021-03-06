<?php

namespace AnalyticsBundle\Repository;

use AnalyticsBundle\Repository\EntityRepository;
use AnalyticsBundle\Entity\Click;

/**
 * ClickRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClickRepository extends EntityRepository {

    public function create($params) {

        $click = new Click();

        $click->setRedirectionId($params['redirectionId']);
        $click->setUserSession($params['userSession']);
        $click->setReferer($params['referer']);
        $click->setIp($params['ip']);
        $click->setUserAgent($params['userAgent']);
        $click->setStatus($params['status']);
        return $click;
    }

}
