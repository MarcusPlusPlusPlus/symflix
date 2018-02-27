<?php

namespace AppBundle\Repository;

/**
 * SeriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllFilmsName()
    {
        $query = $this->createQueryBuilder("f")
            ->select("f.titre")
            ->setFirstResult(0)
            ->setMaxResults(50)
            ->getQuery();
        return $query->execute();
    }
    public function getSearchFilmsName($name)
    {
        $name .= ".{0,}";
        $query = $this->createQueryBuilder("f")
            ->andWhere("REGEXP(f.titre, :titre) = true")
            ->setParameter("titre", $name)
            ->getQuery();
        return $query->execute();
    }
}
