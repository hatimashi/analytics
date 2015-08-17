<?php

namespace AnalyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Redirection
 *
 * @ORM\Table(name="redirection")
 * @ORM\Entity(repositoryClass="AnalyticsBundle\Repository\RedirectionRepository")
 * 
 */
class Redirection {

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
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="redirection_id")
     * @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     */
    private $campaign_id;
    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="redirection_id")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Click", mappedBy="redirection_id")
     */
    protected $click_id;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", length=255)
     */
    private $is_deleted;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", length=255)
     */
    private $status;
    
    /**
     * @var string
     *
     * @ORM\Column(name="origin_url", type="string", length=255)
     */
    private $origin_url;
    
    /**
     * @var string
     *
     * @ORM\Column(name="generated_url", type="string", length=255)
     */
    private $generated_url;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="options", type="integer", length=255)
     */
    private $options;

    
    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * Constructor
     */
    public function __construct() {
        $this->campaign_id = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set is_deleted
     *
     * @param \bool $isDeleted
     * @return Redirection
     */
    public function setIsDeleted(\bool $isDeleted)
    {
        $this->is_deleted = $isDeleted;

        return $this;
    }

    /**
     * Get is_deleted
     *
     * @return \bool 
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Redirection
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set origin_url
     *
     * @param string $originUrl
     * @return Redirection
     */
    public function setOriginUrl($originUrl)
    {
        $this->origin_url = $originUrl;

        return $this;
    }

    /**
     * Get origin_url
     *
     * @return string 
     */
    public function getOriginUrl()
    {
        return $this->origin_url;
    }

    /**
     * Set generated_url
     *
     * @param string $generatedUrl
     * @return Redirection
     */
    public function setGeneratedUrl($generatedUrl)
    {
        $this->generated_url = $generatedUrl;

        return $this;
    }

    /**
     * Get generated_url
     *
     * @return string 
     */
    public function getGeneratedUrl()
    {
        return $this->generated_url;
    }

    /**
     * Set options
     *
     * @param integer $options
     * @return Redirection
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return integer 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Redirection
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

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
     * Set campaign_id
     *
     * @param \AnalyticsBundle\Entity\Campaign $campaignId
     * @return Redirection
     */
    public function setCampaignId(\AnalyticsBundle\Entity\Campaign $campaignId = null)
    {
        $this->campaign_id = $campaignId;

        return $this;
    }

    /**
     * Get campaign_id
     *
     * @return \AnalyticsBundle\Entity\Campaign 
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * Set user_id
     *
     * @param \UserBundle\Entity\User $userId
     * @return Redirection
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
     * Add click_id
     *
     * @param \AnalyticsBundle\Entity\Click $clickId
     * @return Redirection
     */
    public function addClickId(\AnalyticsBundle\Entity\Click $clickId)
    {
        $this->click_id[] = $clickId;

        return $this;
    }

    /**
     * Remove click_id
     *
     * @param \AnalyticsBundle\Entity\Click $clickId
     */
    public function removeClickId(\AnalyticsBundle\Entity\Click $clickId)
    {
        $this->click_id->removeElement($clickId);
    }

    /**
     * Get click_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClickId()
    {
        return $this->click_id;
    }
}