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
     * @var string
     *
     * @ORM\Column(name="video", type="string")
     */
    private $video;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="durationTime", type="datetime")
     */
    private $durationTime;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Series", inversedBy="episode", cascade={"persist"})
     */
    private $serie;

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
     * Set video
     * @param string $video
     * @return Episode
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get season
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
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

    public function setSerie(Series $serie = null)
    {
      $this->serie = $serie;
    }
  
    public function getSerie()
    {
      return $this->serie;
    }

}
