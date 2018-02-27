<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 26/02/2018
 * Time: 12:36
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Manager\SeriesManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeriesController extends Controller
{
    /**
     * @Route("/series", name="list_series")
     */
    public function listAction(SeriesManager $seriesManager){
        $series = $seriesManager->getSeries();
        return $this->render('series/list_series.html.twig', ['series'=>$series]);
    }

    /**
     * @Route("/series/{id}", name="serie_view", requirements={"id"="\d+"})
     */
    public function viewSerie(SeriesManager $manager, int $id){
        $serie = $manager->getSerie($id);

        return $this->render('series/view_serie.html.twig', ['serie'=>$serie]);
    }
}