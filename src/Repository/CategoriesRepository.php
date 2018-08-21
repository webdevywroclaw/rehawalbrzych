<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CategoriesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g')
            ->leftJoin('p.photoId', 'g')
            ->getQuery();
        return $qb->getArrayResult();
    }

    public function findById($id)
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g')
            ->where('p.catId = '.$id)
            ->leftJoin('p.photoId', 'g')
            ->getQuery();
        return $qb->getArrayResult();
    }
}