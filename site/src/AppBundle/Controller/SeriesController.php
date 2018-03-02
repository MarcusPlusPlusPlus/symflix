<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 26/02/2018
 * Time: 12:36
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Series;
use AppBundle\Form\SerieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Manager\SeriesManager;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;



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
        dump($serie);
        return $this->render('series/view_serie.html.twig', ['serie'=>$serie]);

    }

    /**
     * @Route("/series/add", name="serie_add")
     */
    public function addAction(SeriesManager $seriesManager ,Request $request){
        $serie = new Series();

        $form = $this->createForm(SerieType::class, $serie);

        $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
           $seriesManager->CreateSerie($form->getData());

            return $this->redirectToRoute('list_series');
        }
        return $this->render('series/add.html.twig', ['form' => $form->createView()])
        ;
    }

    /**
     * @Route("/series/edit/{id}", name="serie_edit", requirements={"id"="\d+"})
     */
    public function editAction(Request $request, Series $series){
        $form = $this->createForm(SerieType::class, $series);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $series = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($series);
            $em->flush();

            $this->addFlash('succes','La série à été modifiée avec succés');
            return $this->redirectToRoute('list_series');
        }
        return $this->render('/series/edit.html.twig', ['form' => $form->createView()]);
    }
}