<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 26/02/2018
 * Time: 22:50
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Film;
use AppBundle\Entity\Actor;
use AppBundle\Entity\Director;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FilmFixtures extends Fixture
{
    public function load(objectManager $manager){
        $actor1 = new Actor();
        $actor1->setName("Actor1");
        $actor2 = new Actor();
        $actor2->setName("Actor2");
        $actor3 = new Actor();
        $actor3->setName("Actor3");
        /**/
        $title = ["Black Panther", "The Grand Budapest Hotel", "Terminator", "The Dark Knight"];
        $durationTime = ["2h15", "1h40", "1h47", "2h32"];
        $releaseDate = new\DateTime();
        $video = "link";
        $directors = ["Ryan Coogler", "Wes Anderson", "James Cameron", "Christopher Nolan"];
        $actors = ["lorem", "ipsum", "dolor", "sit"];
        // create 20 products! Bam!
        for ($i = 0; $i < 4; $i++) {
            $film = new Film();
            $film
                ->setTitre($title[$i])
                ->setDureeFilm($durationTime[$i])
                ->setDateSortie(new\DateTime())
                ->setVideo("link")
                ->setRealisateur($directors[$i])
                ->setActeurs($actors[$i]);
            $director = new Director();
            $director->setName($directors[$i]);
            $director->addFilm($film);
            $actor1->addFilm($film);
            $actor2->addFilm($film);
            $actor3->addFilm($film);
            $manager->persist($film);
            $manager->persist($actor1);
            $manager->persist($actor2);
            $manager->persist($actor3);
            $manager->persist($director);
        }
        $manager->flush();
    }
}
