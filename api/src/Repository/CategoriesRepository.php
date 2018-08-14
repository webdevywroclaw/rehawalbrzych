<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CategoriesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p')
            ->getQuery();
        return $qb->getArrayResult();
    }
}