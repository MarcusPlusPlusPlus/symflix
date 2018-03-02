<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="dureeFilm", type="string", length=255)
     */
    private $dureeFilm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="datetime")
     */
    private $dateSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255)
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\Column(name="realisateur", type="string", length=255)
     */
    private $realisateur;
    /**
     * @var string
     *
     * @ORM\Column(name="acteurs", type="string", length=255)
     */
    private $acteurs;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", cascade={"persist"})
     */
    private $categories;

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dureeFilm
     *
     * @param string $dureeFilm
     *
     * @return Film
     */
    public function setDureeFilm($dureeFilm)
    {
        $this->dureeFilm = $dureeFilm;

        return $this;
    }

    /**
     * Get dureeFilm
     *
     * @return string
     */
    public function getDureeFilm()
    {
        return $this->dureeFilm;
    }

    /**
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     *
     * @return Film
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Film
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set realisateur
     *
     * @param string $realisateur
     *
     * @return Film
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return string
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\Category $category
     * @return Film
     */
    public function addCategories(Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Category $category
     */
    public function removeCategorie(\AppBundle\Entity\Category $category)
    {
        $this->categorie->removeElement($category);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set acteurs
     *
     * @param string $acteurs
     *
     * @return Film
     */
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    /**
     * Get acteurs
     *
     * @return string
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }
}
