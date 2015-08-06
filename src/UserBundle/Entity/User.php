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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AdvUrl", mappedBy="user")
     */
    protected $adv_url;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Campaign", mappedBy="user")
     */
    protected $campaign;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
