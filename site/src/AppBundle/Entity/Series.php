<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Series
 *
 * @ORM\Table(name="series")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeriesRepository")
 */
class Series
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
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="datetime")
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="durationTime", type="string", length=255)
     */
    private $durationTime;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Episode", mappedBy="series")
     */
    private $episode;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", cascade={"persist"})
     */
     private $categories;

    public function __construct()
    {
        $this->episode = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    /**
     * @return Collection|Episode[]
     */
    public function getEpisode() {
        return $this->episode;
    }

    public function addCategory(Category $category) {
      $this->categories[] = $category;
    }

    public function removeCategory(Category $category) {
      $this->categories->removeElement($category);
    }

    public function getCategories() {
      return $this->categories;
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
     * @return Series
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
     * @return Series
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
     * Set createionDate
     *
     * @param \DateTime $createionDate
     *
     * @return Series
     */
    public function setCreateionDate($createionDate)
    {
        $this->createionDate = $createionDate;

        return $this;
    }

    /**
     * Get createionDate
     *
     * @return \DateTime
     */
    public function getCreateionDate()
    {
        return $this->createionDate;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Series
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set durationTime
     *
     * @param string $durationTime
     *
     * @return Series
     */
    public function setDurationTime($durationTime)
    {
        $this->durationTime = $durationTime;

        return $this;
    }

    /**
     * Get durationTime
     *
     * @return string
     */
    public function getDurationTime()
    {
        return $this->durationTime;
    }
}

