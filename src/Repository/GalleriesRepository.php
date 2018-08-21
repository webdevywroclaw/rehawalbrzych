<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class GalleriesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p')
            ->getQuery();
        return $qb->getArrayResult();
    }

}