<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class GalleriesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'a', 'm')
            ->leftJoin('p.artId', 'a')
            ->leftJoin('p.metId','m')
            ->getQuery();
        return $qb->getArrayResult();
    }

}