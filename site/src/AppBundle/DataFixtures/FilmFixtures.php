<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 01/03/2018
 * Time: 10:14
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FilmFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager){
        $Film = new Film();

        $Film
            ->setTitre("The Black Panther")
            ->setDureeFilm("2h45")
            ->setDateSortie(new\DateTime())
            ->setVideo("link")
            ->setRealisateur("Bryan")
            ->setActeurs("test1, test2")
            ->addCategories($this->getReference('category2'))
            ->addCategories($this->getReference('category4'))
            ;
        $manager->persist($Film);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}