<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class TherapeutistsRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g')
            ->leftJoin('p.photoPhoto', 'g')
            ->getQuery();
        return $qb->getArrayResult();
    }

    public function findById($id)
    {
        $qb = $this->createQueryBuilder('p')->select('p', 'g', 'e')
            ->where('p.therapId = '.$id)
            ->leftJoin('p.photoPhoto', 'g')
            ->leftJoin('p.educationEdu', 'e')
            ->getQuery();
        return $qb->getArrayResult();
    }

}