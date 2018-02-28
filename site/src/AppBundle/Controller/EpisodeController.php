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
     * @Route("/Episode", name="list_episode")
     */
    public function listAction(EpisodeManager $episodeManager){
        $episode = $episodeManager->getEpisodes();
        return $this->render('episodes/list_episode.html.twig', ['epiosdes'=>$episode]);
    }

    /**
     * @Route("/episodes/{id}", name="episode_view", requirements={"id"="\d+"})
     */
    public function viewEpisode(EpisodeManager $episodeManager, int $id){
        $episode = $episodeManager->getEpisode($id);
        return $this->render('episode/view_episode.html.twig', ['episode'=>$episode]);
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
        return $this->render('episode/add.html.twig', ['form'=>$form->createView()]);
    }

}