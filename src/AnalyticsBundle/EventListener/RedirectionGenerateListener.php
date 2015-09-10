<?php

namespace AnalyticsBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AnalyticsBundle\Entity\Redirection;

class RedirectionGenerateListener {

    protected $container;

    public function __construct($container) {

        $this->container = $container;
    }

    public function prePersist(LifecycleEventArgs $args) {
        $regex = "/(https?:\/\/).*/";
        $protocol = "http://";


        $entity = $args->getEntity();
        $em = $args->getEntityManager();
        $date = microtime();


        if ($entity instanceof Redirection) {
            $originUrl = $entity->getOriginUrl();

            $service = $this->container->get('analytics.generate.factory')->factory();
            $generatedUrl = $service->makeGeneratedUrl($originUrl, $date);
            if (preg_match($regex, $generatedUrl) == FALSE) {
                $generatedUrl = substr_replace($generatedUrl, $protocol, 0, 0);
            }
            $entity->setGeneratedUrl($generatedUrl);
        }
    }

}
