<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * GeneratedLink
 *
 * @ORM\Table(name="generated_link")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GeneratedLinkRepository")
 */
class GeneratedLink
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
     * 
     * @ORM\OneToOne(targetEntity="AdvUrl", inversedBy="generated_link")
     * @ORM\JoinColumn(name="generated_link", referencedColumnName="id")
     */
    private $adv_url;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Click", mappedBy="generated_link")
     */
    private $click;
    
    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * @return GeneratedLink
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
     * @return GeneratedLink
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
        $this->click = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set adv_url
     *
     * @param \AppBundle\Entity\AdvUrl $advUrl
     * @return GeneratedLink
     */
    public function setAdvUrl(\AppBundle\Entity\AdvUrl $advUrl = null)
    {
        $this->adv_url = $advUrl;

        return $this;
    }

    /**
     * Get adv_url
     *
     * @return \AppBundle\Entity\AdvUrl 
     */
    public function getAdvUrl()
    {
        return $this->adv_url;
    }

    /**
     * Add click
     *
     * @param \AppBundle\Entity\Click $click
     * @return GeneratedLink
     */
    public function addClick(\AppBundle\Entity\Click $click)
    {
        $this->click[] = $click;

        return $this;
    }

    /**
     * Remove click
     *
     * @param \AppBundle\Entity\Click $click
     */
    public function removeClick(\AppBundle\Entity\Click $click)
    {
        $this->click->removeElement($click);
    }

    /**
     * Get click
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClick()
    {
        return $this->click;
    }
}
