<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Click
 *
 * @ORM\Table(name="click")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ClickRepository")
 */
class Click
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
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="GeneratedLink", inversedBy="click")
     * @ORM\JoinColumn(name="click", referencedColumnName="id")
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
     * @return Click
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
     * @return Click
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
     * Set generated_link
     *
     * @param \AppBundle\Entity\GeneratedLink $generatedLink
     * @return Click
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
