<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 01/03/2018
 * Time: 10:22
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager){
        $Category1 = new Category();
        $Category1
            ->setName('Comedie Fantastique')
            ;
        $manager->persist($Category1);


        $Category2 = new Category();
        $Category2
            ->setName('Action')
        ;
        $manager->persist($Category2);


        $Category3 = new Category();
        $Category3
            ->setName('Aventure')
        ;
        $manager->persist($Category3);


        $Category4 = new Category();

        $Category4
            ->setName('Comedie Fantastique')
        ;
        $manager->persist($Category4);



        $manager->flush();
        $this->addReference('category1', $Category1);
        $this->addReference('category3', $Category3);
        $this->addReference('category4', $Category4);
        $this->addReference('category2', $Category2);
    }
}