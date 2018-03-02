<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SerieRepository")
 */
class Serie
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Episode", mappedBy="serie")
     */
    private $episodes;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", cascade={"persist"})
     */
     private $categories;

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }


    public function addEpisode(Episode $episode) {
        $this->episodes[] = $episode;
    }
    /**
     * @return Collection|Episode[]
     */
    public function getEpisodes() {
        return $this->episodes;
    }

    public function addCategory(Category $category) {
      $this->categories[] = $category;
      return $this;
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
     * @return Serie
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
     * @return Serie
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Serie
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Serie
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
     * @return Serie
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

    /**
     * Remove episode
     *
     * @param \AppBundle\Entity\Episode $episode
     */
    public function removeEpisode(\AppBundle\Entity\Episode $episode)
    {
        $this->episodes->removeElement($episode);
    }
}
