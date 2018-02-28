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
     * @Route("film/list", name="film-list")
     */
    public function filmListBasicAction()
    {
        $data = $this->fm->getAllFilmsName();
        dump($data);
        return $this->render("film/list.html.twig", []);
    }

    /**
     * @Route("/film/search/{filmTitle}", name="film-search")
     */
    public function filmSearchAction($filmTitle)
    {
        $data = $this->fm->getSearchFilmsName($filmTitle);
        dump($filmTitle, $data);
        return $this->render("film/search.html.twig", []);
    }
}
