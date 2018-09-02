<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ArticlesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g', 'c')
            ->leftJoin('p.categoryCat', 'c')
            ->leftJoin('p.galleryGal', 'g')
            ->getQuery();
        return $qb->getArrayResult();
    }

    public function findById($id)
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g')
            ->where('p.artId = '.$id)
            ->leftJoin('p.galleryGal', 'g')
            ->getQuery();
        return $qb->getArrayResult();
    }

    public function findAllByCategory($catId)
    {
        $qb = $this->createQueryBuilder('p')->select('p')
            ->where('p.categoryCat = '.$catId)
            ->getQuery();
        return $qb->getArrayResult();
    }
}