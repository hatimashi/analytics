<?php

namespace AnalyticsBundle\Repository;

use Doctrine\ORM\EntityRepository as BaseRepository;
use AnalyticsBundle\Entity\Redirection;

class EntityRepository extends BaseRepository {

    public function create($params) {

        return $entity;
    }

    public function save($entity) {

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();


        return $entity;
    }

    public function findEntity($entityName, $searchByField){
        $entity = $this->getEntityManager()->getRepository($entityName)->findOneBy($searchByField);
 
        return $entity;
    }
    
    public function findRedirection($entityName, $redirectionOriginUrl) {
        $entity = $this->getEntityManager()->getRepository($entityName)->findOneBy(array('origin_url' => $redirectionOriginUrl));

        if($entity){
        $options = $entity->getOptions()? $entity->getOptions(): FALSE ;
        
        $response = ($options == Redirection::OPTIONS_ALLOWED_FROM_DIFFERENT_DOMAIN) ? array(
            'redirection' => $entity,
            'redirectionUrl' => $entity->getRedirectUrl(),
            ) : $response = FALSE;
        }else {
            $response = FALSE;
        }

        return $response;
    }

}
