<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 28/02/2018
 * Time: 09:29
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Episode;
use Doctrine\ORM\EntityManagerInterface;

class EpisodeManager
{
    /**
     * @var EntityManagerInterfacey
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getEpisodes(){
        return $this->em->getRepository(Episode::class)->findAll();
    }

    public function getEpisode(int $id){
        return $this->em->getRepository(Episode::class)->find($id);
    }

    public function CreateEpisode(Episode $episode){
        $this->em->persist($episode);
        $this->em->flush();
        return$episode;
    }

    public function editEpisode(Episode $episode){
        $this->em->persist($episode);
        $this->em->flush();
        return $episode;
    }

}