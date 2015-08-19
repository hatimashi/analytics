<?php

namespace AnalyticsBundle\Repository;

use Doctrine\ORM\EntityRepository as BaseRepository;

class EntityRepository extends BaseRepository {

//    public function create() {
//        
//    }

    public function update() {
    }
    
    public function save($entity) {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        return $entity;
    }

}
