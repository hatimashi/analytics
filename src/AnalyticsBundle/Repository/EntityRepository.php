<?php

namespace AnalyticsBundle\Repository;

use Doctrine\ORM\EntityRepository as BaseRepository;
use AnalyticsBundle\Entity\Redirection;

class EntityRepository extends BaseRepository {

//    public function create() {
//        
//    }

//    public function update() {
//        
//    }

    public function create($userId, $originUrl, $generatedUrl) {
        
        $redirection = new Redirection();

        $redirection->setUserId($userId);
        $redirection->setOriginUrl($originUrl);
        $redirection->setGeneratedUrl($generatedUrl);
        
        return $redirection;
    }

    public function save($entity) {

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();


        return $entity;
    }

}
