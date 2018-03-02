<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 26/02/2018
 * Time: 12:36
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Serie;
use AppBundle\Form\SerieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Manager\SerieManager;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;



class SerieController extends Controller
{
    /**
     * @Route("/serie", name="list_serie")
     */
    public function listAction(SerieManager $serieManager){
        $serie = $serieManager->getSeries();
        return $this->render('serie/list_serie.html.twig', ['serie'=>$serie]);
    }

    /**
     * @Route("/serie/{id}", name="serie_view", requirements={"id"="\d+"})
     */
    public function viewSerie(SerieManager $manager, int $id){
        $serie = $manager->getSerie($id);
        dump($serie);
        return $this->render('serie/view_serie.html.twig', ['serie'=>$serie]);

    }

    /**
     * @Route("/serie/add", name="serie_add")
     */
    public function addAction(SerieManager $serieManager ,Request $request){
        $serie = new Serie();

        $form = $this->createForm(SerieType::class, $serie);

        $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
           $serieManager->CreateSerie($form->getData());

            return $this->redirectToRoute('list_serie');
        }
        return $this->render('serie/add.html.twig', ['form' => $form->createView()])
        ;
    }

    /**
     * @Route("/serie/edit/{id}", name="serie_edit", requirements={"id"="\d+"})
     */
    public function editAction(Request $request, Serie $serie){
        $form = $this->createForm(SerieType::class, $serie);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $serie = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            $this->addFlash('succes','La série à été modifiée avec succés');
            return $this->redirectToRoute('list_serie');
        }
        return $this->render('/serie/edit.html.twig', ['form' => $form->createView()]);
    }
}