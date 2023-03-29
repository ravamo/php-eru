<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RosterMemberRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RosterMemberRepository extends EntityRepository
{
    public function getRosterMembersCount($active, $eruType = null)
    {
        $qb = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->andWhere('r.active = :active')
            ->setParameter(':active', $active);

        if ($eruType) {
            $qb
                ->join('r.eruTypes','e', 'WITH', 'e.name = :eruType')
                ->setParameter(':eruType', $eruType);
        }

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getTotalRosterMembersGenderCount($territorialOfficeId = null)
    {
        $qb = $this->createQueryBuilder('r')
            ->select('count(r.id) as value')
            ->join('r.genre', 'g')
            ->addSelect('g.name as label');

        if ($territorialOfficeId) {
            $qb
                ->andWhere('r.territorialOffice = :territorialOfficeId')
                ->setParameter('territorialOfficeId', $territorialOfficeId);
        }

        $qb->groupBy('g.name');

        return $qb->getQuery()->getArrayResult();
    }

    public function getTotalRosterMembersGenderCountByEru($eruType, $territorialOfficeId = null)
    {
        $qb = $this->createQueryBuilder('r')
            ->select('count(r.id) as value')
            ->join('r.genre', 'g')
            ->addSelect('g.name as label')
            ->join('r.eruTypes','e', 'WITH', 'e.name = :eruType')
            ->setParameter(':eruType', $eruType);;

        if ($territorialOfficeId) {
            $qb
                ->andWhere('r.territorialOffice = :territorialOfficeId')
                ->setParameter('territorialOfficeId', $territorialOfficeId);
        }

        $qb->groupBy('g.name');

        return $qb->getQuery()->getArrayResult();
    }
}