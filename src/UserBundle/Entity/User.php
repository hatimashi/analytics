<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AnalyticsBundle\Entity\Redirection", mappedBy="user_id")
     */
    protected $redirection_id;
    
    /**
     * @ORM\OneToMany(targetEntity="AnalyticsBundle\Entity\Campaign", mappedBy="user_id")
     */
    protected $campaign_id;
    
    public function __construct()
    {
        parent::__construct();
        $this->redirection = new \Doctrine\Common\Collections\ArrayCollection();
        $this->campaign = new \Doctrine\Common\Collections\ArrayCollection();
        // your own logic
    }
}
