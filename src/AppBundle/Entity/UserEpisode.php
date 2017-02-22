<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserEpisode
 * @package AppBundle\Entity
 * @ORM\Entity
 */
class UserEpisode
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Episode")
     * @ORM\JoinColumn(name="episode_id", referencedColumnName="id")
     */
    private $episode_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $current = true;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $watchedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getEpisodeId()
    {
        return $this->episode_id;
    }

    /**
     * @param string $episode_id
     */
    public function setEpisodeId($episode_id)
    {
        $this->episode_id = $episode_id;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param mixed $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    public function __construct()
    {
        $this->watchedAt = new \DateTime();
    }
    /**
     * @return \DateTimeInterface
     */
    public function getWatchedAt()
    {
        return $this->watchedAt;
    }

    /**
     * @param \DateTimeInterface $watchedAt
     */
    public function setWatchedAt($watchedAt)
    {
        $this->watchedAt = $watchedAt;
    }

    
}