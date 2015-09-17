<?php

namespace AnalyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Redirection Statistic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AnalyticsBundle\Repository\RedirectionStatisticRepository")
 */
class RedirectionStatistic
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
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Redirection", inversedBy="redirect_url_id")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $redirect_url_id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="click_count", type="integer")
     */
    private $click_count;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

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
     * Set redirectUrlId
     *
     * @param integer $redirectUrlId
     *
     * @return RedirectionStatistic
     */
    public function setRedirectUrlId($redirectUrlId)
    {
        $this->redirect_url_id = $redirectUrlId;

        return $this;
    }

    /**
     * Get redirectUrlId
     *
     * @return integer
     */
    public function getRedirectUrlId()
    {
        return $this->redirect_url_id;
    }

    /**
     * Set click_count
     *
     * @param integer $click_count
     *
     * @return RedirectionStatistic
     */
    public function setClickCount($click_count)
    {
        $this->click_count = $click_count;

        return $this;
    }

    /**
     * Get click_count
     *
     * @return integer
     */
    public function getClickCount()
    {
        return $this->click_count;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return RedirectionStatistic
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return RedirectionStatistic
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
    
    public function __toString() {

     return (string)$this->click_count;
    }
}
