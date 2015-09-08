<?php

namespace AnalyticsBundle\Command;

use Doctrine\Common\Persistence\ObjectManager;
use AnalyticsBundle\Entity\Click;
use DateTime;

class LoadCronTaskData {

    protected $container;
    protected $oldRedisKeys;

    /**
     * {@inheritDoc}
     */
    public function __construct($container) {
        $this->container = $container;
        $params = $this->load();
        $this->writeRedis($params);
    }

    public function load() {
        $currentTime = time();
        $offsetTime = time() - 300;
        $oldKeys = array();
        $redis = $this->container->get('snc_redis.default');
        $keys = $redis->keys('click:*');

        foreach ($keys as $key) {
            $date = new DateTime();
            $keyTimeStamp = explode(':', $key)[2];
            $date->setTimestamp($keyTimeStamp);
            if ($keyTimeStamp < $offsetTime) {
                $oldKeys[] = array(
                    'key' => $key,
                    'value' => $redis->get($key),
                );
            }
        }
        $response = $oldKeys;
        $this->oldRedisKeys = $oldKeys;

        return $response;
    }
    
    public function updateRedis() {
        $redis = $this->container->get('snc_redis.default');
        $keysToDelete = '';
        
        foreach ($this->oldRedisKeys as $key){
            $redis->del($key['key']);
        }
    }

    public function writeRedis($params) {
        $keys = $params;

        $parameters = array();
        foreach ($keys as $key) {
            $redirectUrl['generated_url'] = $this->container->getParameter('system_url') . '/id=' . explode(':', $key['key'])[3];
            $redirection = $this->container->get('generate')->findEntity('AnalyticsBundle:Redirection', $redirectUrl);
            
            if ($redirection) {
                $date = new DateTime();
                $statisticFromRedis = array(
                    'redirectUrlId' => $redirection,
                    'clickCount' => $key['value'],
                    'date' => $date->setTimestamp(explode(':', $key['key'])[2]),
                );
                $redirectionEntity = $this->container->get('redirection_statistic')->findEntity('AnalyticsBundle:RedirectionStatistic', array('redirect_url_id' => $redirection->getId()));
                
                if ($redirectionEntity) {
                    $statisticFromRedis['clickCount'] = $redirectionEntity->getClickCount() + $key['value'];
                    $entity = $this->container->get('redirection_statistic')->update($redirectionEntity, $statisticFromRedis);
                } else {
                    $entity = $this->container->get('redirection_statistic')->create($statisticFromRedis);
                }
                if ($entity) {
                    if($this->container->get('redirection_statistic')->save($entity)){
                        $this->updateRedis();
                    }
                }
            }
        }
    }

}
