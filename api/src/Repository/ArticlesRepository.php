<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ArticlesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g')
            ->leftJoin('p.galleryGal', 'g')
            ->getQuery();
        return $qb->getArrayResult();
    }
}