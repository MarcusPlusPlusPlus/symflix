<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 26/02/2018
 * Time: 14:08
 */

namespace AppBundle\Manager;

use AppBundle\Entity\Series;
use Doctrine\ORM\EntityManagerInterface;

class SeriesManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function getSeries(){
        return $this->em->getRepository(Series::class)->findAll();
    }

    public function getSerie(int $id){
        return $this->em->getRepository(Series::class)->find($id);
    }

}