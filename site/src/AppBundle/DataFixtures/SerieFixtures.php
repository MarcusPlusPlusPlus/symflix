<?php
namespace AppBundle\DataFixtures;
use AppBundle\Entity\Serie;
use AppBundle\Entity\Episode;
use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SerieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $serie = new Serie();
        $serie
            ->setName("serieName")
            ->setDescription("serieDescription")
            ->setCreationDate(new\DateTime())
            ->setReleaseDate(new\DateTime())
            ->setDurationTime("1h31")
            ->addCategory($this->getReference('category1'))
            ->addCategory($this->getReference('category3'))
        ;


        $manager->persist($serie);
        $manager->flush();
        $this->addReference('serie', $serie);
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class
        ];
    }
}