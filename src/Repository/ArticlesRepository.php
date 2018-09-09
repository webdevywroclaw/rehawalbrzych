<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ArticlesRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g', 'c', 'a')
            ->leftJoin('p.categoryCat', 'c')
            ->leftJoin('p.galleryGal', 'g')
            ->leftJoin('p.artAuthor', 'a')
            ->getQuery();
        return $qb->getArrayResult();
    }

    public function findById($id)
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g','c', 'a')
            ->where('p.artId = '.$id)
            ->leftJoin('p.categoryCat', 'c')
            ->leftJoin('p.galleryGal', 'g')
            ->leftJoin('p.artAuthor', 'a')
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