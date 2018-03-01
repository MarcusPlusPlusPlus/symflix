<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 01/03/2018
 * Time: 10:09
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Episode;
use AppBundle\Entity\Series;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager){
        $Episode = new Episode();

//        $serie = $this->getReference('serie-yolo');
//        var_dump($serie);

//        $episode = new Episode();
//        $category = new Category();
        /* SERIES */


        $Episode
            ->setName("Le debut de l'aventure")
            ->setDescription("Que l'histoire commnece avec Axel")
            ->setVideo("link video")
            ->setDurationTime(new\DateTime())
            ->setSerie($this->getReference('serie'))
            ;


        $manager->persist($Episode);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeriesFixtures::class
        ];
    }
}