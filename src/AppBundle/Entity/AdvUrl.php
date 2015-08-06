<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AdvUrl
 *
 * @ORM\Table(name="adv_url")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AdvUrlRepository")
 */
class AdvUrl
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
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="adv_url_id")
     * @ORM\JoinColumn(name="adv_url_id", referencedColumnName="id")
     */
    private $campaign;
    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="adv_url")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * 
     * @ORM\OneToOne(targetEntity="GeneratedLink", mappedBy="adv_url")
     */
    private $generated_link;
    
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
     * @return AdvUrl
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
     * @return AdvUrl
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
     * Set campaign
     *
     * @param \AppBundle\Entity\Campaign $campaign
     * @return AdvUrl
     */
    public function setCampaign(\AppBundle\Entity\Campaign $campaign = null)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get campaign
     *
     * @return \AppBundle\Entity\Campaign 
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return AdvUrl
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set generated_link
     *
     * @param \AppBundle\Entity\GeneratedLink $generatedLink
     * @return AdvUrl
     */
    public function setGeneratedLink(\AppBundle\Entity\GeneratedLink $generatedLink = null)
    {
        $this->generated_link = $generatedLink;

        return $this;
    }

    /**
     * Get generated_link
     *
     * @return \AppBundle\Entity\GeneratedLink 
     */
    public function getGeneratedLink()
    {
        return $this->generated_link;
    }
}
