<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class TVSeriesRepository
 * @package AppBundle\Repository
 */
class TVSeriesRepository extends EntityRepository
{
    /**
     * Retourne la liste en pagination des séries tv par
     * ordre alphabétique
     *
     * @param int $page
     * @param int $maxperpage
     * @return Paginator
     */
    public function getList($page = 1, $maxperpage = 6)
    {
        $q = $this->_em->createQueryBuilder()
            ->select('tvseries')
            ->from('AppBundle:TVSeries', 'tvseries')
            ->orderBy('tvseries.name', 'ASC');

        $q->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);

        return new Paginator($q);
    }

    /**
     * Retourne le nombre de séries tv
     *
     * @return int
     */
    public function countTVSeries()
    {
        $q = $this->_em->createQueryBuilder();

        $q->select($q->expr()->count('tvseries'))
            ->from('AppBundle:TVSeries', 'tvseries');

        return (int) $q->getQuery()->getSingleScalarResult();
    }
}
