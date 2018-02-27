<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\FilmManager;

class FilmController extends Controller
{
    private $am;
    public function __construct(FilmManager $filmManager)
    {
        $this->fm = $filmManager;
    }

    /**
     * @Route("/film/search/{filmTitle}", name="film-search")
     */
    public function filmSearchAction($filmTitle)
    {
        dump($filmTitle);
        $data = $this->fm->getSearchFilmsName($filmTitle);
        dump($data);
        return $this->render("film/search.html.twig", []);
    }
}
