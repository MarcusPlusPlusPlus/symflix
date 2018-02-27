<?php
namespace AppBundle\DataFixtures;
use AppBundle\Entity\Series;
use AppBundle\Entity\Episode;
use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SeriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $series = new Series();
        $episode = new Episode();
        $category = new Category();
        /* SERIES */
        $series->setName("seriesName");
        $series->setDescription("seriesDescription");
        $series->setCreationDate(new\DateTime());
        $series->setReleaseDate(new\DateTime());
        $series->setDurationTime("1h31");
        /* EPISODE */
        $episode->setName("episodeName");
        $episode->setDescription("episodeDescription");
        $episode->setSeason(1);
        $episode->setEpisode(1);
        $episode->setDurationTime(new\DateTime());
        /* CATEGORY */
        $category->setName("categoryName");
        /* SERIES RELATIONS */
        $series->addEpisode($episode);
        $series->addCategory($category);
        $episode->setSeries($series);
        /* MANAGER */

/*
setDurationDate
setDurationTime
*/


        $manager->persist($series);
        $manager->persist($episode);
        $manager->persist($category);
        $manager->flush();
        $manager->flush();
        $manager->flush();
    }
}