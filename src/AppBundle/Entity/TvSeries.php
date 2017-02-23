<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class TvSeries
{
	/**
	 * @var string
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
	 */
	private $id;
	/**
	 * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank()
	 */
	private $name;
	/**
	 * @var string
     * @ORM\Column(nullable=true)
	 */
	private $author;
	/**
	 * @var \DateTimeInterface
     * @ORM\Column(type="datetime", nullable=true)
	 */
	private $releasedAt;
	/**
	 * @var string
	 */
	private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="Episode", mappedBy="tvSeries")
     */
    private $episode;

    public function __construct()
    {
        $this->episode = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * @param mixed $episode
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getReleasedAt()
    {
        return $this->releasedAt;
    }

    /**
     * @param \DateTimeInterface $releasedAt
     */
    public function setReleasedAt($releasedAt)
    {
        $this->releasedAt = $releasedAt;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
	/**
	 * @var string
	 */
	private $image;


    /**
     * Add episode
     *
     * @param \AppBundle\Entity\Episode $episode
     *
     * @return TvSeries
     */
    public function addEpisode(\AppBundle\Entity\Episode $episode)
    {
        $this->episode[] = $episode;

        return $this;
    }

    /**
     * Remove episode
     *
     * @param \AppBundle\Entity\Episode $episode
     */
    public function removeEpisode(\AppBundle\Entity\Episode $episode)
    {
        $this->episode->removeElement($episode);
    }

    /**
     * toString
     * @return string
     */
    public function __toString() 
    {
        return $this->getId();
    }
}
