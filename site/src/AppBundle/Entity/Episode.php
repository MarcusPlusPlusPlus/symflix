<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Table(name="episode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EpisodeRepository")
 */
class Episode
{
    /**
     * @var int
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="season", type="integer")
     */
    private $season;

    /**
     * @var int
     *
     * @ORM\Column(name="episode", type="integer")
     */
    private $episode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="durationTime", type="time")
     */
    private $durationTime;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Series", inversedBy="episode")
     * @ORM\JoinColumn(nullable=true)
     */
    private $series;

    public function getSeries(): Series
    {
        return $this->series;
    }

    public function setSeries(Category $series)
    {
        $this->series = $series;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Episode
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
     * Set description
     *
     * @param string $description
     *
     * @return Episode
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set season
     *
     * @param integer $season
     *
     * @return Episode
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set episode
     *
     * @param integer $episode
     *
     * @return Episode
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return int
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set durationTime
     *
     * @param \DateTime $durationTime
     *
     * @return Episode
     */
    public function setDurationTime($durationTime)
    {
        $this->durationTime = $durationTime;

        return $this;
    }

    /**
     * Get durationTime
     *
     * @return \DateTime
     */
    public function getDurationTime()
    {
        return $this->durationTime;
    }
}

