<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 28/02/2018
 * Time: 09:27
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use AppBundle\Form\EpisodeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Manager\EpisodeManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EpisodeController extends Controller
{
    /**
     * @Route("/episode", name="list_episode")
     */
    public function listAction(EpisodeManager $episodeManager){
        $episode = $episodeManager->getEpisodes();
        return $this->render('episodes/list_episode.html.twig', ['episodes'=>$episode]);
    }

    /**
     * @Route("/episode/{id}", name="episode_view", requirements={"id"="\d+"})
     */
    public function viewEpisode(EpisodeManager $episodeManager, int $id){
        $episode = $episodeManager->getEpisode($id);

        return $this->render('episodes/view_episode.html.twig', ['episode'=>$episode]);
    }

    /**
     * @Route("episode/add", name="episode_add")
     */
    public function addAction(Request $request, EpisodeManager $episodeManager){
        $episode = new Episode();

        $form = $this->createForm(EpisodeType::class, $episode);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $episodeManager->CreateEpisode($form->getData());

            return $this->redirectToRoute('list_episode');
        }
        return $this->render('episodes/add.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/episode/edit/{id}", name="episode_edit")
     */
    public function editAction(Request $request, Episode $episode, EpisodeManager $manager){
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $episode = $form->getData();
            $manager->editEpisode($episode);

            return $this->redirectToRoute('list_episode');
        }
        return $this->render('episodes/edit.html.twig', ['form'=> $form->createView()]);
    }
}