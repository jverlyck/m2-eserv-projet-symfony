<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserEpisode
 *
 * @ORM\Table(name="user_episode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserEpisodeRepository")
 */
class UserEpisode
{
    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var Episode
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Episode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $episode;

    /**
     * @var bool
     *
     * @ORM\Column(name="current", type="boolean", nullable=true)
     */
    private $current;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="watchedAt", type="datetime", nullable=true)
     */
    private $watchedAt;


    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get episode
     *
     * @return Episode
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set current
     *
     * @param boolean $current
     * @return UserEpisode
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get current
     *
     * @return boolean 
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Set watchedAt
     *
     * @param \DateTime $watchedAt
     * @return UserEpisode
     */
    public function setWatchedAt($watchedAt)
    {
        $this->watchedAt = $watchedAt;

        return $this;
    }

    /**
     * Get watchedAt
     *
     * @return \DateTime 
     */
    public function getWatchedAt()
    {
        return $this->watchedAt;
    }
}
