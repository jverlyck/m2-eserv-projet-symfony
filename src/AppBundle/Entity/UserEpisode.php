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
    private $user_id;

    /**
     * @var Episode
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Episode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $episode_id;

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
     * Get user_id
     *
     * @return User
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get episode_id
     *
     * @return Episode
     */
    public function getEpisodeId()
    {
        return $this->episode_id;
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
