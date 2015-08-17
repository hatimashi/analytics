<?php

namespace AnalyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="AnalyticsBundle\Repository\CampaignRepository")
 */
class Campaign {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="campaign_id")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Redirection", mappedBy="campaign_id")
     */
    protected $redirection_id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * Constructor
     */
    public function __construct() {
        $this->redirection_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Campaign
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

//    /**
//     * Set created
//     *
//     * @param \DateTime $created
//     * @return Campaign
//     */
//    public function setCreated($created)
//    {
//        $this->created = $created;
//
//        return $this;
//    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user_id
     *
     * @param \UserBundle\Entity\User $userId
     * @return Campaign
     */
    public function setUserId(\UserBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Add redirection_id
     *
     * @param \AnalyticsBundle\Entity\Redirection $redirectionId
     * @return Campaign
     */
    public function addRedirectionId(\AnalyticsBundle\Entity\Redirection $redirectionId)
    {
        $this->redirection_id[] = $redirectionId;

        return $this;
    }

    /**
     * Remove redirection_id
     *
     * @param \AnalyticsBundle\Entity\Redirection $redirectionId
     */
    public function removeRedirectionId(\AnalyticsBundle\Entity\Redirection $redirectionId)
    {
        $this->redirection_id->removeElement($redirectionId);
    }

    /**
     * Get redirection_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRedirectionId()
    {
        return $this->redirection_id;
    }
}
