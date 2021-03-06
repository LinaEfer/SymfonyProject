<?php

namespace AppBundle\Entity;

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
     * @var User
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userEpisode")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Episode
     * 
     * @ORM\ManyToOne(targetEntity="Episode", inversedBy="userEpisode")
     * @ORM\JoinColumn(name="episode_id", referencedColumnName="id")
     */
    private $episode;

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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Episode
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * @param Episode $episode
     */
    public function setEpisode(Episode $episode)
    {
        $this->episode = $episode;
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