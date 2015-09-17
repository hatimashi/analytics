<?php

namespace AnalyticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Click
 *
 * @ORM\Table(name="click")
 * @ORM\Entity(repositoryClass="AnalyticsBundle\Repository\ClickRepository")
 */
class Click
{
    const STATUS_OK = 0;
    const STATUS_FRAUD = 1;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Redirection", inversedBy="click_id")
     * @ORM\JoinColumn(name="redirection_id", referencedColumnName="id", nullable=TRUE)
     */
    private $redirection_id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_session", type="string", length=255)
     */
    private $user_session;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="string", length=255)
     */
    private $referer;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=255)
     */
    private $user_agent;
    
    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

        /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", length=255)
     */
    private $status;
    
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
     * Set user_session
     *
     * @param string $userSession
     * @return Click
     */
    public function setUserSession($userSession)
    {
        $this->user_session = $userSession;

        return $this;
    }

    /**
     * Get user_session
     *
     * @return string 
     */
    public function getUserSession()
    {
        return $this->user_session;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return Click
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string 
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Click
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set user_agent
     *
     * @param string $userAgent
     * @return Click
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get user_agent
     *
     * @return string 
     */
    public function getUserAgent()
    {
        return $this->user_agent;
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
     * Set redirection_id
     *
     * @param \AnalyticsBundle\Entity\Redirection $redirectionId
     * @return Click
     */
    public function setRedirectionId(\AnalyticsBundle\Entity\Redirection $redirectionId = null)
    {
        $this->redirection_id = $redirectionId;

        return $this;
    }

    /**
     * Get redirection_id
     *
     * @return \AnalyticsBundle\Entity\Redirection 
     */
    public function getRedirectionId()
    {
        return $this->redirection_id;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Click
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
    
    public function __toString() {

     return $this->user_session;
    }
}
