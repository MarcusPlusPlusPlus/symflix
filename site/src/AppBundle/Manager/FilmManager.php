<?php
namespace AppBundle\Manager;
use AppBundle\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistance\ManagerRegistery;
use AppBundle\Entity\Film;
use AppBundle\Entity\Category;
use AppBundle\Entity\Director;
use AppBundle\Entity\Actor;

class FilmManager {

    private $em;    // EM !
    
    public function __construct(EntityManagerInterface $entityManager) {
        $this->em = $entityManager;
    }


    public function getAllFilms()           // Have a list off all movies
    {
        $data = $this->em->getRepository(Film::class)->findAll();
        return $data;
    }

    public function getAllFilmsName()
    {
        $data = $this->em->getRepository(Film::class)->getAllFilmsName();
        return $data;
    }

    public function getSearchFilmsName($name)     // Search a movie
    {
        $data = $this->em->getRepository(Film::class)->getFilmsByName($name);
        return $data;
    }
}