<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CampaignRepository")
 */
class Campaign
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="campaign")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user_id;
    
    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AdvUrl", mappedBy="campaign")
     */
    protected $adv_url_id;

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

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Campaign
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
     * Constructor
     */
    public function __construct()
    {
        $this->adv_url_id = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add adv_url_id
     *
     * @param \AppBundle\Entity\AdvUrl $advUrlId
     * @return Campaign
     */
    public function addAdvUrlId(\AppBundle\Entity\AdvUrl $advUrlId)
    {
        $this->adv_url_id[] = $advUrlId;

        return $this;
    }

    /**
     * Remove adv_url_id
     *
     * @param \AppBundle\Entity\AdvUrl $advUrlId
     */
    public function removeAdvUrlId(\AppBundle\Entity\AdvUrl $advUrlId)
    {
        $this->adv_url_id->removeElement($advUrlId);
    }

    /**
     * Get adv_url_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdvUrlId()
    {
        return $this->adv_url_id;
    }
}
