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

        return $this->render('series/view_serie.html.twig', ['serie'=>$serie]);
    }

    /**
     * @Route("/series/add", name="serie_add")
     */
    public function addAction(SeriesManager $seriesManager ,Request $request){
        $serie = new Series();

        $form = $this->createForm(SerieType::class, $serie);
//            ->add('name', TextType::class)
//            ->add('description', TextareaType::class)
//            ->add('creationDate', DateType::class)
//            ->add('releaseDate', DateType::class)
//            ->add('durationTime', TextType::class)
//            ->add('categories', EntityType::class, [
//                'class'=>Category::class,
//                'choice_label'=> 'name',
//                'multiple'=>true,
//            ])
//            ->add('save', SubmitType::class, ['label' =>'Ajouter une Serie'])
//            ->getForm();

        $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
           $seriesManager->CreateSerie($form->getData());

            return $this->redirectToRoute('list_series');
        }
        return $this->render('series/add.html.twig', ['form' => $form->createView()])
        ;





    }
}