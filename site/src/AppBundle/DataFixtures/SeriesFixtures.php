<?php
namespace AppBundle\DataFixtures;
use AppBundle\Entity\Series;
use AppBundle\Entity\Episode;
use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SeriesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $series = new Series();
        $series
            ->setName("seriesName")
            ->setDescription("seriesDescription")
            ->setCreationDate(new\DateTime())
            ->setReleaseDate(new\DateTime())
            ->setDurationTime("1h31")
            ->addCategory($this->getReference('category1'))
            ->addCategory($this->getReference('category3'))
        ;


        $manager->persist($series);
        $manager->flush();
        $this->addReference('serie', $series);
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class
        ];
    }
}